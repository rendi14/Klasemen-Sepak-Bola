(function() {
  "use strict";


        const activePage = window.location.pathname;
        const navLinks = document.querySelectorAll('nav a').forEach(link => {
            if (link.href.includes(`${activePage}`)) {
                link.classList.add('side-menu--active');
                console.log(link);
            }
        })
})()