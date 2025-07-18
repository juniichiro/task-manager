document.addEventListener('DOMContentLoaded', function () {
    // Feature tabs functionality
    const tabs = document.querySelectorAll('.feature-tab');
    let currentActiveTab = document.querySelector('.feature-tab.active');

    tabs.forEach(tab => {
        tab.addEventListener('click', function () {
            if (this === currentActiveTab) return;

            // Remove active class from current tab
            currentActiveTab.classList.remove('active');

            // Add active class to clicked tab
            this.classList.add('active');
            currentActiveTab = this;

            // Get corresponding image holder
            const tabName = this.getAttribute('data-tab');
            const targetHolder = document.getElementById(`${tabName}-holder`);

            // Hide all image holders
            document.querySelectorAll('.image-holder').forEach(holder => {
                holder.classList.remove('active');
            });

            // Show target image holder after short delay
            setTimeout(() => {
                targetHolder.classList.add('active');
            }, 150);
        });
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
});