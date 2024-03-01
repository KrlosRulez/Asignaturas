window.onload = function () {

    var register_name = document.getElementById("register_name");
    var register_surname = document.getElementById("register_surname");
    var register_email = document.getElementById("register_email");
    var register_password = document.getElementById("register_password");
    var register_comments = document.getElementById("register_comments");
    var register_terms = document.getElementById("register_terms");
    var submit_button = document.getElementById("submit_button");

    var error_name = document.getElementById("error_name");
    var error_surname = document.getElementById("error_surname");
    var error_email = document.getElementById("error_email");
    var error_password = document.getElementById("error_password");
    var error_comments = document.getElementById("error_comments");
    var error_terms = document.getElementById("error_terms");

    var RegEx_Name = /.*[a-zA-Z].*/;
    var RegEx_Email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var RegEx_Comments = /^.{1,50}$/;
    var RegEx_Password = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;

    const validate = (register, RegEx) => {

        if (RegEx.test(register.value)) {

            return true;

        } else {

            return false;

        }

    }

    const enableSubmit = () => {

        if (validate(register_name, RegEx_Name) &&
        validate(register_surname, RegEx_Name) &&
        validate(register_email, RegEx_Email) &&
        validate(register_comments, RegEx_Comments) &&
        validate(register_password, RegEx_Password) &&
        register_terms.checked) {

            submit_button.style.display = "block";

        } else {

            submit_button.style.display = "none";

        }

    }

    register_name.addEventListener("focusout", function() {

        if (validate(register_name, RegEx_Name) == false) {

            register_name.classList = "invalid";

            error_name.style.display = "block";

        } else {

            register_name.classList = "valid";
            
            error_name.style.display = "none";

        }

        enableSubmit();

    });

    register_surname.addEventListener("focusout", function() {

        if (validate(register_surname, RegEx_Name) == false) {

            register_surname.classList = "invalid";

            error_surname.style.display = "block";

        } else {

            register_surname.classList = "valid";

            error_surname.style.display = "none";

        }

        enableSubmit();

    });

    register_email.addEventListener("focusout", function() {

        if (validate(register_email, RegEx_Email) == false) {

            register_email.classList = "invalid";

            error_email.style.display = "block";

        } else {

            register_email.classList = "valid";

            error_email.style.display = "none";

        }

        enableSubmit();

    });

    register_comments.addEventListener("focusout", function() {

        if (validate(register_comments, RegEx_Comments) == false) {

            register_comments.classList = "invalid";

            error_comments.style.display = "block";

        } else {

            register_comments.classList = "valid";

            error_comments.style.display = "none";

        }

        enableSubmit();

    });

    register_password.addEventListener("focusout", function() {

        if (validate(register_password, RegEx_Password) == false) {

            register_password.classList = "invalid";

            error_password.style.display = "block";

        } else {

            register_password.classList = "valid";

            error_password.style.display = "none";

        }

        enableSubmit();

    });

    register_terms.addEventListener("click", function() {

        if (register_terms.checked == false) {

            error_terms.style.display = "block";

        } else {

            error_terms.style.display = "none";

        }

        enableSubmit();

    });

}