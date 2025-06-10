import {settings} from "./settings";

export const observers = {
    appearLeftElements: document.querySelectorAll(`[data-animation='${settings.appearLeftClass}']`),
    appearElements: document.querySelectorAll(`[data-animation='${settings.appearClass}']`),
    appearLeftBallElements: document.querySelectorAll(`[data-animation='${settings.appearLeftBallCLass}']`),
    comingLeftBallsElement: document.querySelectorAll(`[data-animation='${settings.comingLeftBallsClass}']`),
    comingRightBallsElement: document.querySelectorAll(`[data-animation='${settings.comingRightBallsClass}']`),
    cueCareerReverseElement: document.querySelectorAll(`[data-animation='${settings.cueCareerReverse}']`),
    cueCareerNormalElement: document.querySelectorAll(`[data-animation='${settings.cueCareerNormal}']`),

    init() {
        this.comingLeftBallsElement.forEach((element) => {
            element.classList.add(settings.noOpacityClass)
        })
        this.comingRightBallsElement.forEach((element) => {
            element.classList.add(settings.noOpacityClass)
        })

        this.appearElements.forEach((element) => {
            element.classList.add(settings.noOpacityClass);
        });
        this.appearLeftElements.forEach((element) => {
            element.classList.add(settings.noOpacityClass);
        });
        this.appearLeftBallElements.forEach((element) => {
            element.classList.add(settings.noOpacityClass);
        });


        this.cueCareerReverseObserver = new IntersectionObserver(this.cueCareerReverseAnimate, {

            root: null,
            rootMargin: "-25% 0px -75% 0px",
            threshold: 0
        })
        this.cueCareerNormalObserver = new IntersectionObserver(this.cueCareerNormalAnimate, {

            root: null,
            rootMargin: "-25% 0px -75% 0px",
            threshold: 0
        })
        this.comingLeftBallsObserver = new IntersectionObserver(this.comingLeftBallsAnimate, {
            root: null,
            rootMargin: "-50% 0px -50% 0px",
            threshold: 0
        })
        this.leavingLeftBallsObserver = new IntersectionObserver(this.leavingLeftBallsAnimate, {
            root: null,
            rootMargin: "-25% 0px -75% 0px",
            threshold: 0
        })
        this.comingRightBallsObserver = new IntersectionObserver(this.comingRightBallsAnimate, {
            root: null,
            rootMargin: "-50% 0px -50% 0px",
            threshold: 0
        })
        this.leavingRightBallsObserver = new IntersectionObserver(this.leavingRightBallsAnimate, {
            root: null,
            rootMargin: "-25% 0px -75% 0px",
            threshold: 0
        })

        this.appearObserver = new IntersectionObserver(this.appearAnimate, {threshold: 0.5});
        this.appearLeftObserver = new IntersectionObserver(this.appearLeftAnimate, {threshold: 0.1});
        this.appearLeftBallObserver = new IntersectionObserver(this.appearLeftBallAnimate, {threshold: 0.5});
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

    comingLeftBallsAnimate(elements) {
        elements.forEach((element) => {
            if (element.isIntersecting) {
                element.target.classList.add(settings.comingLeftBallsClass)
                element.target.classList.remove(settings.noOpacityClass)
            }
        })
    },
    leavingLeftBallsAnimate(elements) {
        elements.forEach((element) => {
            if (element.isIntersecting) {
                element.target.classList.remove(settings.comingLeftBallsClass)
                element.target.classList.add(settings.leavingLeftBallClass)
            }
        })
    },
    leavingRightBallsAnimate(elements) {
        elements.forEach((element) => {
            if (element.isIntersecting) {
                element.target.classList.remove(settings.comingRightBallsClass)
                element.target.classList.add(settings.leavingRightBallClass)
            }
        })
    },
    comingRightBallsAnimate(elements) {
        elements.forEach((element) => {
            if (element.isIntersecting) {
                element.target.classList.add(settings.comingRightBallsClass)
                element.target.classList.remove(settings.noOpacityClass)
            }
        })
    },
    cueCareerReverseAnimate(elements) {
        elements.forEach((element) => {

            if (element.isIntersecting) {
                element.target.classList.add(settings.cueCareerReverse)
            }
        })
    },
    cueCareerNormalAnimate(elements) {
        elements.forEach((element) => {

            if (element.isIntersecting) {
                element.target.classList.add(settings.cueCareerNormal)
            }
        })
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

        this.cueCareerReverseElement.forEach((element) => {
            this.cueCareerReverseObserver.observe(element)
        })
        this.cueCareerNormalElement.forEach((element) => {
            this.cueCareerNormalObserver.observe(element)
        })

        this.comingLeftBallsElement.forEach((element) => {
            this.comingLeftBallsObserver.observe(element)
            this.leavingLeftBallsObserver.observe(element)
        })
        this.comingRightBallsElement.forEach((element) => {
            this.comingRightBallsObserver.observe(element)
            this.leavingRightBallsObserver.observe(element)
        })

        this.appearLeftBallElements.forEach((element) => {
            this.appearLeftBallObserver.observe(element)
        })

        this.appearElements.forEach((element) => {
            this.appearObserver.observe(element)
        })
        this.appearLeftElements.forEach((element) => {
            this.appearLeftObserver.observe(element)
        })
    },


}

/*
root: null,
            rootMargin: "-25% 0px -75% 0px",
 */