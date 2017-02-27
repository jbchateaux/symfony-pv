import closest from 'closest';

class Nav {
    constructor(header, nav) {
        this.options = {
        };

        this.header = header;
        this.navBtn = this.header.querySelector('.js-nav-btn');
        this.logoBtn = this.header.querySelector('.js-logo-btn');

        this.body = document.querySelector('body');
        this.sections = [...this.body.querySelectorAll('.Section')];

        this.initEvents();
    }

    initEvents() {
        window.addEventListener('scroll', this.windowScroll.bind(this));
        this.navBtn.addEventListener('click', this.clickNavBtn.bind(this));
        document.addEventListener('click', (e) => {
            const parentBtn = closest(e.target, ".js-nav-btn", true);
            const parentNav = closest(e.target, ".js-nav", true);

            if (!e.target.classList.contains("js-nav-btn") && !e.target.classList.contains("js-nav") && typeof parentBtn == "undefined" && typeof parentNav == "undefined")
                this.body.classList.remove('Nav-open')
        });
    }

    windowScroll(e) {
        let wOffsetY = e.pageY;
        const logoHeight = this.logoBtn.offsetHeight;
        const logoWOffsetY = this.logoBtn.getBoundingClientRect().top;
        const logoTop = logoHeight + logoWOffsetY;

        this.sections.forEach((section) => {

            if (section.classList.contains("Section_Light")) {
                let sectionWOffsetY = section.getBoundingClientRect().top;

                (logoTop < sectionWOffsetY) ? this.header.classList.remove('Header-dark') : this.header.classList.add('Header-dark');
            }

        })

    }

    clickNavBtn(e) {
        const target = e.target;
        const parent = closest(target, ".js-nav-btn", true);

        (this.body.classList.contains('Nav-open')) ? this.body.classList.remove('Nav-open') : this.body.classList.add('Nav-open');
    }


}

export default Nav ;


