var webdriver = require('selenium-webdriver');
var SeleniumServer = require('selenium-webdriver/remote').SeleniumServer;
var request = require('request');
var assert = require('selenium-webdriver/testing/assert');
var remoteHub = 'http://hub.crossbrowsertesting.com:80/wd/hub';

var username = 'chhi5098@colorado.edu'; 
var authkey = 'uf33c324018390c0';

var caps = {
    'name': 'Basic Test Example',
    'build': '1.0',
    'browserName': 'Chrome',
    'deviceName': 'Galaxy S6',
    'platformVersion': '5.0',
    'platformName': 'Android',
    'deviceOrientation': 'portrait'};

caps.username = username;
caps.password = authkey;

var sessionId = null;

//register general error handler
webdriver.promise.controlFlow().on('uncaughtException', webdriverErrorHandler);
 
var driver = new webdriver.Builder()
    .usingServer(remoteHub)
    .withCapabilities(caps)
    .build();

driver.getSession().then(function(session){
    sessionId = session.id_; //need for API calls
});
driver.get('http://crossbrowsertesting.github.io/selenium_example_page.html');
driver.getTitle().then(function(title){
    console.log('page title is ', title);
    assert(title).equals('Selenium Test Example Page');
});

driver.quit();

//set the score as passing
driver.call(setScore, null, 'pass');

//Call API to set the score
function setScore(score) {

    //webdriver has built-in promise to use
    var deferred = webdriver.promise.defer();
    var result = { error: false, message: null }

    if (sessionId){
        
        request({
            method: 'PUT',
            uri: 'https://crossbrowsertesting.com/api/v3/selenium/' + sessionId,
            body: {'action': 'set_score', 'score': score },
            json: true
        },
        function(error, response, body) {
            if (error) {
                result.error = true;
                result.message = error;
            }
            else if (response.statusCode !== 200){
                result.error = true;
                result.message = body;
            }
            else{
                result.error = false;
                result.message = 'success';
            }

            deferred.fulfill(result);
        })
        .auth(username, authkey);
    }
    else{
        result.error = true;
        result.message = 'Session Id was not defined';
        deferred.fulfill(result);
    }

    return deferred.promise;
}

//general error catching function
function webdriverErrorHandler(err){

    console.error('There was an unhandled exception! ' + err);

    //if we had a session, end it and mark failed
    if (driver && sessionId){
        driver.quit();
        setScore('fail').then(function(result){
            console.log('set score to fail')
        })
    }
}