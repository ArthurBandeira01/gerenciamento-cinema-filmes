const toggleButton = document.getElementById('toggleSidebar');
const sidebar = document.getElementById('sidebar');
const userDropdownButton = document.getElementById('userDropdownButton');
const userDropdownMenu = document.getElementById('userDropdownMenu');
const reportDropdownButton = document.getElementById('reportDropdownButton');
const reportListDropdownMenu = document.getElementById('reportListDropdownMenu');

toggleButton.addEventListener('click', function() {
    sidebar.classList.toggle('hidden');
});

// Dropdown header
userDropdownButton.addEventListener('click', function() {
    userDropdownMenu.classList.toggle('hidden');
});

document.addEventListener('click', function(event) {
    if (!userDropdownButton.contains(event.target) && !userDropdownMenu.contains(event.target)) {
        userDropdownMenu.classList.add('hidden');
    }
});

//Dropdown aside
reportDropdownButton.addEventListener('click', function() {
    reportListDropdownMenu.classList.toggle('hidden');
});

document.addEventListener('click', function(event) {
    if (!reportDropdownButton.contains(event.target) && !reportListDropdownMenu.contains(event.target)) {
        reportListDropdownMenu.classList.add('hidden');
    }
});
