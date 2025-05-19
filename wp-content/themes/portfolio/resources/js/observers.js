import {settings} from "./settings";

export const observers = {
    appearLeftElements: document.querySelectorAll(`[data-animation='${settings.appearLeftClass}']`),
    appearElements: document.querySelectorAll(`[data-animation='${settings.appearClass}']`),
    appearLeftBallElements: document.querySelectorAll(`[data-animation='${settings.appearLeftBallCLass}']`),


    init() {
        this.appearElements.forEach((element) => {
            element.classList.add(settings.noOpacityClass);
        });
        this.appearLeftElements.forEach((element) => {
            element.classList.add(settings.noOpacityClass);
        });
        this.appearLeftBallElements.forEach((element) => {
            element.classList.add(settings.noOpacityClass);
        });
        this.appearObserver = new IntersectionObserver(this.appearAnimate, {threshold: 0.5});
        this.appearLeftObserver = new IntersectionObserver(this.appearLeftAnimate, {threshold: 0.5});
        this.appearLeftBallObserver  = new IntersectionObserver(this.appearLeftBallAnimate, {threshold: 0.5});
        this.observerAction()
    },

    appearLeftAnimate(elements) {
        const visibleElements = elements
            .filter(el => el.isIntersecting)
            .slice()
            .reverse();

        visibleElements.forEach((element, index) => {
            element.target.classList.add(settings.appearLeftClass);
            element.target.classList.remove(settings.noOpacityClass)

        });
    },
    appearLeftBallAnimate(elements) {
        elements.forEach((element) => {
            if (element.isIntersecting) {
                element.target.classList.add(settings.appearLeftBallCLass)
                element.target.classList.remove(settings.noOpacityClass)
            }

        })
    },

    appearAnimate(elements) {
        let index = 0;
        elements.forEach((element) => {
            if (element.isIntersecting) {
                setTimeout(() => {
                    element.target.classList.add(settings.appearClass)
                    element.target.classList.remove(settings.noOpacityClass)
                }, index * 200)
                index++;
            }
        })
    },
    observerAction() {

        this.appearLeftBallElements.forEach((element)=>{
            this.appearLeftBallObserver.observe(element)
        })

        this.appearElements.forEach((element) => {
            this.appearObserver.observe(element)
        })
        this.appearLeftElements.forEach((element) => {
            this.appearLeftObserver.observe(element)
        })
    }

}