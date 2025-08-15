// Theme toggle functionality
const themeToggle = document.getElementById('theme-toggle');
const html = document.documentElement;

// Check for saved theme preference or default to light mode
const savedTheme = localStorage.getItem('theme') || 'light';
html.classList.toggle('dark', savedTheme === 'dark');
updateThemeIcon();

themeToggle.addEventListener('click', () => {
    html.classList.toggle('dark');
    const currentTheme = html.classList.contains('dark') ? 'dark' : 'light';
    localStorage.setItem('theme', currentTheme);
    updateThemeIcon();
});

function updateThemeIcon() {
    const isDark = html.classList.contains('dark');
    const sunIcon = themeToggle.querySelector('.fa-sun');
    const moonIcon = themeToggle.querySelector('.fa-moon');
    
    if (isDark) {
        sunIcon.classList.add('hidden');
        moonIcon.classList.remove('hidden');
    } else {
        sunIcon.classList.remove('hidden');
        moonIcon.classList.add('hidden');
    }
}
