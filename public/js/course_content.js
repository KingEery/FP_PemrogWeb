        function toggleDropdown(menuId, iconId) {
            const menu = document.getElementById(menuId);
            const icon = document.getElementById(iconId);

            menu.classList.toggle("hidden");
            icon.classList.toggle("bx-chevron-down");
            icon.classList.toggle("bx-chevron-up");
        }

    function toggleSidebar() {
        const sidebar = document.getElementById("sidebar");
        sidebar.classList.toggle("translate-x-full");
    }
