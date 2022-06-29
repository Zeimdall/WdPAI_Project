const { I } = inject();

module.exports = {
    locators: {
        emailInput: "#email",
        passwordInput: "#password",
        confirmPasswordInput: "#confirm-password",
        loginButton: "#loginbtn",
        registerButton: "#registbtn",
        loginRegisterOption: "#register-option"
    },

    tryToLoginWithIncorrectEmailForm(incorrectEmail, password) {
        I.fillField(this.locators.emailInput, incorrectEmail);
        I.fillField(this.locators.passwordInput, password);
        I.click(this.locators.loginButton);
    },

    tryToLoginWithEmptyCredentials() {
        I.click(this.locators.loginButton);
    },

    tryToLoginWithIncorrectPassword(email, incorrectPass) {
        I.fillField(this.locators.emailInput, email);
        I.fillField(this.locators.passwordInput, incorrectPass);
        I.click(this.locators.loginButton);
    },

    tryToRegisterUserWithEmptyCredentials() {
        I.click(this.locators.loginRegisterOption);
        I.click(this.locators.registerButton);
    },

    loginByAdmin(adminEmail, adminPass) {
        I.fillField(this.locators.emailInput, adminEmail);
        I.fillField(this.locators.passwordInput,adminPass);
        I.click(this.locators.loginButton);
    },

    loginByUser(userEmail, userPass) {
        I.fillField(this.locators.emailInput, userEmail);
        I.fillField(this.locators.passwordInput, userPass);
        I.click(this.locators.loginButton);
    },

    registerNewUser(newEmail, newPass) {
        I.click(this.locators.loginRegisterOption);
        I.fillField(this.locators.emailInput, newEmail);
        I.fillField(this.locators.passwordInput, newPass);
        I.fillField(this.locators.confirmPasswordInput, newPass);
        I.click(this.locators.registerButton);
    },

    tryToRegisterWithDifferentPasswords(newEmail, newPass, diffPass) {
        I.click(this.locators.loginRegisterOption);
        I.fillField(this.locators.emailInput, newEmail);
        I.fillField(this.locators.passwordInput, newPass);
        I.fillField(this.locators.confirmPasswordInput, diffPass);
        I.click(this.locators.registerButton);
    }
}