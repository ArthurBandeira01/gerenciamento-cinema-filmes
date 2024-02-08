const toggleButton = document.getElementById('toggleSidebar');
const sidebar = document.getElementById('sidebar');
const userDropdownButton = document.getElementById('userDropdownButton');
const userDropdownMenu = document.getElementById('userDropdownMenu');

toggleButton.addEventListener('click', function() {
    sidebar.classList.toggle('hidden');
});

userDropdownButton.addEventListener('click', function() {
    userDropdownMenu.classList.toggle('hidden');
});

document.addEventListener('click', function(event) {
    if (!userDropdownButton.contains(event.target) && !userDropdownMenu.contains(event.target)) {
        userDropdownMenu.classList.add('hidden');
    }
});
