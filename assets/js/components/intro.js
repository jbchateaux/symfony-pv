import closest from 'closest';

class Intro {
    constructor(intro) {
        this.options = {
        };

        this.intro = intro;
        this.introContainer = this.intro.querySelector(".js-intro-container");
        this.introImg = this.intro.querySelector(".js-intro-img");
        this.introShadow = this.intro.querySelector(".js-intro-shadow");
        this.introMask = this.intro.querySelector(".js-intro-mask");
        this.projects = document.querySelector(".js-projects");
        this.introShadowHeight = this.introShadow.offsetHeight;

        this.movementStrength = 175;

        this.initEvents();
    }

    initEvents() {
        window.addEventListener("scroll", this.windowScroll.bind(this));
        this.introContainer.addEventListener("mousemove", this.mouseMove.bind(this));
    }

    mouseMove(e) {
        const centerXMask = 50 + (e.clientX - (window.innerWidth / 2))/this.movementStrength;
        const centerYMask = 50 + (e.clientY - (window.innerHeight / 2))/this.movementStrength;

        const centerXImg = 50 + (e.clientX - (window.innerWidth / 2))/(this.movementStrength-125);
        const centerYImg = 50 + (e.clientY - (window.innerHeight / 2))/(this.movementStrength-125);

        this.introMask.style.backgroundPosition = centerXMask+"% "+centerYMask+"%";
    }

    windowScroll(e) {
        const introImgHeight = this.introImg.offsetHeight;
        const windowOffsetY = e.pageY;
        const imgScale = 1+(windowOffsetY/4500);
        const height = this.introShadowHeight+windowOffsetY;
        const marginTop = -(windowOffsetY/8);

        const projectsOffsets = this.projects.getBoundingClientRect();

        if (windowOffsetY >= projectsOffsets.top) {
            [...this.projects.querySelectorAll('.Project')].forEach((project,i) => {
                let delay = 250*(i+1);

                setTimeout(function() {
                    project.classList.add('Project-animate');
                }, delay);
            });
        }

        if (introImgHeight > windowOffsetY) {
            this.introContainer.style.transform = 'scale('+ imgScale +')';

            this.introContainer.style.marginTop = marginTop+'px';
            this.introShadow.style.height = height+'px';
        }

    }
}

export default Intro ;


