import './bootstrap';

import 'flowbite';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();


document.querySelectorAll(".submit-form").forEach(
    (form) =>
        (form.onsubmit = async (e) => {
            e.preventDefault();

            let url = "/api";
      
            let method = form.dataset.method;
            let action = form.dataset.action;
            let callback = form.dataset.callback;

            let body = new FormData(form);
            let headers = {
                "_method" : method
            };

            let submitButton = form.querySelector('[type="submit"]');
            let loadIcon = submitButton.querySelectorAll('.load-icon')[0];
            let loadText = submitButton.querySelectorAll('.load-text')[0];

            submitButton.classList.add("loading", "disabled");
            submitButton.classList.remove("hover:bg-blue-500");
            submitButton.setAttribute("disabled", "disabled");
            loadIcon.classList.remove("hidden");
            loadText.classList.add("hidden");

            if (typeof bearer_token !== "undefined") {
                headers["Authorization"] = `Bearer ${bearer_token}`;
            }
            headers["Accept"] = "application/json";

            let response = await fetch(url + action, {
                method: method,
                body: body,
                headers: headers,
            })
                .then(function (response) {
                    if (!response.ok) {

                        if (response.status === 422) {
                            response.json().then((result) => {
              
                                if (typeof result.errors !== "undefined") {
                                    for (const [key, value] of Object.entries(result.errors)) {
                                        const input = document.querySelector(`[id=${key}]`);
                                        input.parentElement.querySelectorAll(".label, .description")[0].classList.add("text-red-500");
                        
                                        input.classList.add("bg-red-200", "focus:border-red-500");
                                        document.querySelector(`[id=error_${key}]`).innerHTML = value;
                                    }

                                  
                                }
                            });
                        }

                        if (response.status === 404) {
                            const notFound = document.createElement('div');
                            notFound.classList.add('ui', 'container', 'text-4xl', 'font-bold', 'mt-10');
                            notFound.innerHTML = "Page Not Found";
                            document.querySelector('#everything').innerHTML = '';
                            document.querySelector('#everything').append(notFound);

                        }
                    }
                    submitButton.classList.remove(
                        "loading",
                        "disabled"
                    );
                    submitButton.classList.add("hover:bg-blue-500");
                    submitButton.removeAttribute("disabled");

                    loadIcon.classList.add("hidden");
                    loadText.classList.remove("hidden");

                    return response;
                })
                .then(async (response) => response.json())

                .then(async (result) => {
                    
                    window[callback](result);
                })
                
                .catch((error) => {

                });
        })
);

document.querySelectorAll(".field").forEach((element) => {
    element.addEventListener("input", async function () {
        this.parentElement.querySelectorAll(".label, .description")[0].classList.remove("text-red-500");
                        
        this.classList.remove("bg-red-200", "focus:border-red-500");
        document.querySelector(`[id=error_${this.id}]`).innerHTML = "";
    });
});