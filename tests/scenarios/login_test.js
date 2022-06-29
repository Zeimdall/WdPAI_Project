Feature('login and register');

const pass = "pass123";
const diffPass = "pass1234";
const incorrectEmail = "test123";
const newEmail = incorrectEmail + "@test.pl";
const existedUser = "admin@admin.pl";
const generatedMail = Math.random().toString(36).slice(0, 7) + "@mail.pl";

Before(({I}) => {
   I.amOnPage('');
});

Scenario('Try to login with empty credentials', ({ I, LoginRegisterPage }) => {
    LoginRegisterPage.tryToLoginWithEmptyCredentials();
    I.see("Please fill all of the inputs");
});

Scenario('Try to login with user that doesnt exist', ({I, LoginRegisterPage}) => {
   LoginRegisterPage.tryToLoginWithIncorrectEmailForm(incorrectEmail, pass);
   I.see("User does not exist!");
});

Scenario('Try to login with incorrect password', ({I, LoginRegisterPage}) => {
    LoginRegisterPage.tryToLoginWithIncorrectPassword(existedUser, pass);
    I.see("Wrong password!")
});

Scenario('Try to register with empty credentials', ({I, LoginRegisterPage}) => {
   LoginRegisterPage.tryToRegisterUserWithEmptyCredentials();
   I.see("Please fill all of the inputs");
});

Scenario('Try to register user with different passwords', ({I, LoginRegisterPage}) => {
    LoginRegisterPage.tryToRegisterWithDifferentPasswords(newEmail, pass, diffPass);
    I.see("Please provide proper password");
});

Scenario('Register new user', ({I, LoginRegisterPage}) => {
    LoginRegisterPage.registerNewUser(generatedMail, pass, pass);
    I.see("You've been successfully registered!");
});

Scenario('Login to the page by admin', ({I, LoginRegisterPage}) => {
   LoginRegisterPage.loginByAdmin(existedUser, "admin");
   I.see("Add car");
});

Scenario('Login to the page by user', ({I, LoginRegisterPage}) => {
   LoginRegisterPage.loginByUser("hugh@jackman.pl", "zaq1");
   I.see("Rent a car of your dreams!");
});

