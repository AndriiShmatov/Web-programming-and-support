$(document).ready(function() {
    $("#registerForm").on("submit", function(e) {
        e.preventDefault();
        let formData = $(this).serialize();

        $.ajax({
            url: "register.php",
            type: "POST",
            data: formData,
            success: function(response) {
                if (response === "success") {
                    alert("Реєстрація успішна! Тепер увійдіть.");
                    window.location.href = "login.html";
                } else {
                    $(".error-msg").text(response);
                }
            }
        });
    });

    $("#loginForm").on("submit", function(e) {
        e.preventDefault();
        let formData = $(this).serialize();

        $.ajax({
            url: "login.php",
            type: "POST",
            data: formData,
            success: function(response) {
                if (response === "success") {
                    window.location.href = "profile.html";
                } else {
                    $(".error-msg").text("Неправильний логін або пароль.");
                }
            }
        });
    });

    $("#updateProfileForm").on("submit", function(e) {
        e.preventDefault();

        let password = $("#password").val();
        let confirmPassword = $("#confirm-password").val();

        if (password !== confirmPassword) {
            $(".error-msg").text("Паролі не співпадають.");
            return;
        }

        let formData = $(this).serialize();

        $.ajax({
            url: "update_profile.php",
            type: "POST",
            data: formData,
            success: function(response) {
                if (response === "success") {
                    alert("Профіль оновлено успішно.");
                    window.location.reload();
                } else {
                    $(".error-msg").text(response);
                }
            }
        });
    });
});

$(document).ready(function () {
    $("#updateUsernameForm").on("submit", function (e) {
        e.preventDefault();
        let formData = $(this).serialize();

        $.ajax({
            url: "profile.php",
            type: "POST",
            data: formData,
            success: function (response) {
                if (response === "username-updated") {
                    alert("Ім'я користувача оновлено успішно!");
                } else {
                    alert("Помилка оновлення імені користувача: " + response);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Не вдалося оновити ім'я користувача. Статус: " + textStatus + ", Помилка: " + errorThrown);
            }
        });
    });

    $("#updatePasswordForm").on("submit", function (e) {
        e.preventDefault();
        
        let newPassword = $("#newPassword").val();
        let confirmPassword = $("#confirmPassword").val();

        if (newPassword !== confirmPassword) {
            alert("Паролі не співпадають. Спробуйте ще раз.");
            return;
        }

        let formData = $(this).serialize();

        $.ajax({
            url: "profile.php",
            type: "POST",
            data: formData,
            success: function (response) {
                if (response === "password-updated") {
                    alert("Пароль оновлено успішно!");
                } else {
                    alert("Помилка оновлення пароля: " + response);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Не вдалося оновити пароль. Статус: " + textStatus + ", Помилка: " + errorThrown);
            }
        });
    });
});
