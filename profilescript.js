document.getElementById("togglePassword").addEventListener("click", function(event) {
    event.preventDefault();  // prevent the default link behavior

    const profileContent = document.getElementById("profileContent");
    const changePasswordContent = document.getElementById("changePasswordContent");
    let reservationscontent = document.getElementById("reservationsContainer");

    if (changePasswordContent.style.display === "none") {
        profileContent.style.display = "none";
        changePasswordContent.style.display = "block";
        reservationscontent.style.display  = "none";
    } else {
        changePasswordContent.style.display = "blcok";
        
    }
});

document.getElementById("showProfile").addEventListener("click", function(event) {
    event.preventDefault();  // Prevent the default action of the link
    
    let profileContent = document.getElementById("profileContent");
    let changePasswordContainer = document.getElementById("changePasswordContainer");
    let reservationscontent = document.getElementById("reservationsContainer");

    if (profileContent.style.display === "none") {
        profileContent.style.display = "block";
        changePasswordContent.style.display = "none";
        reservationscontent.style.display  = "none";
    } else {
        profileContent.style.display = "block";
    }
});

document.getElementById("showReservations").addEventListener("click", function(event) {
    event.preventDefault();  // Prevent the default action of the link
    
    let reservationscontent = document.getElementById("reservationsContainer");
    let profileContent = document.getElementById("profileContent");
    let changePasswordContainer = document.getElementById("changePasswordContainer");

    if (reservationscontent.style.display === "none") {
        profileContent.style.display = "none";
        changePasswordContent.style.display = "none";
        reservationscontent.style.display  = "block";
    } else {
        reservationscontent.style.display  = "block";
    }
});
