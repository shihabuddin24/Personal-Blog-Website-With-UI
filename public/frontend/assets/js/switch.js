/* -----------------------------------
           dark-mode
    ----------------------------------- */
    const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
    const logoDark = document.querySelector('.logo-dark');
    const logoWhite = document.querySelector('.logo-white');
    let currentTheme = localStorage.getItem('theme');

    if (!currentTheme) {
        currentTheme = 'light'; // Default theme
        localStorage.setItem('theme', 'light');
    }

    document.documentElement.setAttribute('data-theme', currentTheme);

    if (logoDark && logoWhite) {
        if (currentTheme === 'dark') {
            toggleSwitch.checked = true;
            document.body.classList.add("dark");
            logoDark.classList.add('display-none');
            logoWhite.classList.add('display-block');
        } else {
            logoDark.classList.remove('display-none');
            logoWhite.classList.add('display-none');
        }
    }

    function switchTheme(e) {
        if (e.target.checked) {
            document.documentElement.setAttribute('data-theme', 'dark');
            localStorage.setItem('theme', 'dark');
            document.body.classList.add('dark');
            logoDark.classList.add('display-none');
            logoWhite.classList.add('display-block');
        } else {
            document.documentElement.setAttribute('data-theme', 'light');
            localStorage.setItem('theme', 'light');
            document.body.classList.remove('dark');
            logoDark.classList.remove('display-none');
            logoWhite.classList.remove('display-block');
        }
    }

    if (toggleSwitch) {
        toggleSwitch.addEventListener('change', switchTheme, false);
    }
