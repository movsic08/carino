<script>
    function toggleDarkMode() {
        document.body.classList.toggle('dark-mode');
        var darkModeEnabled = document.body.classList.contains('dark-mode');
        localStorage.setItem('darkModeEnabled', darkModeEnabled);
    }

    function checkDarkModePreference() {
        var darkModeEnabled = localStorage.getItem('darkModeEnabled') === 'true';
        if (darkModeEnabled) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    }

    var darkModeSwitch = document.getElementById('darkModeToggle');
    if (darkModeSwitch) {
        darkModeSwitch.addEventListener('click', toggleDarkMode);
    }

    document.addEventListener('DOMContentLoaded', checkDarkModePreference);
</script>