import './bootstrap';

import Alpine from 'alpinejs';
import AOS from 'aos';
import 'aos/dist/aos.css';

window.Alpine = Alpine;

Alpine.start();
document.addEventListener('DOMContentLoaded', () => {
    console.log('AOS is initializing...');
    AOS.init({
        once: true,
        offset: 120,
        duration: 600,
        easing: 'ease-in-out',
    });
});
