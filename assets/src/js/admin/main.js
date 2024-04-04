/**
 * Plausible Analytics
 *
 * Admin JS
 */
document.addEventListener('DOMContentLoaded', () => {
	if (!document.location.href.includes('plausible_analytics')) {
		return;
	}

	let plausible = {
		/**
		 * Properties
		 */
		nonceElem: document.getElementById('_wpnonce'),
		nonce: '',
		showWizardElem: document.getElementById('show_wizard'),
		domainNameElem: document.getElementById('domain_name'),
		apiTokenElem: document.getElementById('api_token'),
		createAPITokenElems: document.getElementsByClassName('plausible-create-api-token'),
		buttonElems: document.getElementsByClassName('plausible-analytics-button'),
		stepElems: document.getElementsByClassName('plausible-analytics-wizard-next-step'),

		/**
		 * Bind events.
		 */
		init: function () {
			if (document.location.hash === '' && document.getElementById('plausible-analytics-wizard') !== null) {
				document.location.hash = '#welcome_slide';
			}

			if (this.nonceElem !== null) {
				this.nonce = this.nonceElem.value;
			}

			this.toggleWizardStep();

			window.addEventListener('hashchange', this.toggleWizardStep);

			if (this.showWizardElem !== null) {
				this.showWizardElem.addEventListener('click', this.showWizard);
			}

			if (this.domainNameElem !== null) {
				this.domainNameElem.addEventListener('keyup', this.disableConnectButton);
			}

			if (this.apiTokenElem !== null) {
				this.apiTokenElem.addEventListener('keyup', this.disableConnectButton);
			}

			if (this.createAPITokenElems.length > 0) {
				for (let i = 0; i < this.createAPITokenElems.length; i++) {
					this.createAPITokenElems[i].addEventListener('click', this.createAPIToken);
				}
			}

			if (this.buttonElems.length > 0) {
				for (let i = 0; i < this.buttonElems.length; i++) {
					this.buttonElems[i].addEventListener('click', this.saveOption);
				}
			}

			/**
			 * Due to the structure of the toggles, any events bound to them would be triggered twice, that's why we bind it to the documents' click'
			 * event.
			 */
			document.addEventListener('click', this.toggleOption);

			if (this.stepElems.length > 0) {
				for (let i = 0; i < this.stepElems.length; i++) {
					this.stepElems[i].addEventListener('click', this.saveOptionOnNext);
				}
			}
		},

		/**
		 * Toggle Option and store in DB.
		 *
		 * @param e
		 */
		toggleOption: function (e) {
			/**
			 * Make sure event target is a toggle.
			 */
			if (e.target.classList === null || !e.target.classList.contains('plausible-analytics-toggle')) {
				return;
			}

			const button = e.target.closest('button');
			let toggle;

			// The button element is clicked.
			if (e.target.type === 'submit') {
				toggle = button.querySelector('span');
			} else {
				// The span element is clicked.
				toggle = e.target.closest('span');
			}

			let toggleStatus;

			if (button.classList.contains('bg-indigo-600')) {
				// Toggle: off
				button.classList.replace('bg-indigo-600', 'bg-gray-200');
				toggle.classList.replace('translate-x-5', 'translate-x-0');
				toggleStatus = '';
			} else {
				// Toggle: on
				button.classList.replace('bg-gray-200', 'bg-indigo-600');
				toggle.classList.replace('translate-x-0', 'translate-x-5');
				toggleStatus = 'on';
			}

			const form = new FormData();
			form.append('action', 'plausible_analytics_toggle_option');
			form.append('option_name', button.name);
			form.append('option_value', button.value);
			form.append('option_label', button.nextElementSibling.innerHTML);
			form.append('toggle_status', toggleStatus);
			form.append('is_list', button.dataset.list);
			form.append('_nonce', plausible.nonce);

			let result = plausible.ajax(form, null);

			result.then(function (response) {
				if (response.success === false) {
					plausible.toggleOption(e, false);

					return;
				}

				let is_wizard = document.getElementById('plausible-analytics-wizard');

				if (is_wizard !== null) {
					return;
				}

				if (response.additional !== undefined) {
					plausible.renderAdditionalMessages(response.additional, e.target);
				} else {
					plausible.removeAdditionalMessage(e.target);
				}
			});
		},

		/**
		 * Renders a HTML box containing additional information about the enabled option.
		 *
		 * @param html
		 * @param target
		 */
		renderAdditionalMessages: function (html, target) {
			let container = target.closest('.plausible-analytics-group');

			container.innerHTML += html;
		},

		/**
		 * Removes the additional information box when the option is disabled.
		 *
		 * @param target
		 */
		removeAdditionalMessage: function (target) {
			let container = target.closest('.plausible-analytics-group');
			let additionalMessage;

			if (container.children.length > 0) {
				for (let i = 0; i < container.children.length; i++) {
					if (container.children[i].classList.contains('plausible-analytics-hook')) {
						additionalMessage = container.children[i];

						break;
					}
				}
			}

			if (additionalMessage !== undefined) {
				container.removeChild(additionalMessage);
			}
		},

		/**
		 * Save value of input or text area to DB.
		 *
		 * @param e
		 */
		saveOption: function (e) {
			const button = e.target;
			const section = button.closest('.plausible-analytics-section');
			const inputs = section.querySelectorAll('input, textarea');
			const form = new FormData();
			const options = [];

			inputs.forEach(function (input) {
				options.push({name: input.name, value: input.value});
			});

			form.append('action', 'plausible_analytics_save_options');
			form.append('options', JSON.stringify(options));
			form.append('_nonce', plausible.nonce);

			button.children[0].classList.remove('hidden');
			button.setAttribute('disabled', 'disabled');

			plausible.ajax(form, button, null);
		},

		/**
		 * Save Options on Next click for API Token and Domain Name slides.
		 *
		 * @param e
		 */
		saveOptionOnNext: function (e) {
			let hash = document.location.hash.replace('#', '');

			if (hash === 'api_token_slide' || hash === 'domain_name_slide') {
				let form = e.target.closest('.plausible-analytics-wizard-step-section');
				let inputs = form.getElementsByTagName('INPUT');
				let options = [];

				for (let input of inputs) {
					options.push({name: input.name, value: input.value});
				}

				let data = new FormData();
				data.append('action', 'plausible_analytics_save_options');
				data.append('options', JSON.stringify(options));
				data.append('_nonce', plausible.nonce);

				plausible.ajax(data, null, false);
			}
		},

		/**
		 * Disable Connect button if Domain Name or API Token field is empty.
		 *
		 * @param e
		 */
		disableConnectButton: function (e) {
			let target = e.target;
			let button = document.getElementById('connect_plausible_analytics');
			let buttonIsHref = false;

			if (button === null) {
				let slide_id = document.location.hash;
				button = document.querySelector(slide_id + ' .plausible-analytics-wizard-next-step');
				buttonIsHref = true;
			}

			if (button === null) {
				return;
			}

			if (target.value !== '') {
				if (!buttonIsHref) {
					button.disabled = false;
				} else {
					button.classList.remove('pointer-events-none');
					button.classList.replace('bg-gray-200', 'bg-indigo-600')
				}

				return;
			}

			if (!buttonIsHref) {
				button.disabled = true;
				button.innerHTML = button.innerHTML.replace('Connected', 'Connect');
			} else {
				button.classList += ' pointer-events-none';
				button.classList.replace('bg-indigo-600', 'bg-gray-200')
			}
		},

		/**
		 * Open create API token dialog.
		 *
		 * @param e
		 */
		createAPIToken: function (e) {
			e.preventDefault();

			let domain = document.getElementById('domain_name').value;
			domain = domain.replace('/', '%2F');

			window.open(`https://plausible.io/${domain}/settings/integrations?new_token=WordPress`, '_blank', 'location=yes,height=768,width=1024,scrollbars=yes,status=no');
		},

		/**
		 * Show wizard.
		 *
		 * @param e
		 */
		showWizard: function (e) {
			let data = new FormData();
			data.append('action', 'plausible_analytics_show_wizard');
			data.append('_nonce', e.target.dataset.nonce);

			plausible.ajax(data, null);
		},

		/**
		 * Toggles the active/inactive/current state of the steps.
		 */
		toggleWizardStep: function () {
			if (document.getElementById('plausible-analytics-wizard') === null) {
				return;
			}

			const hash = document.location.hash.substring(1).replace('_slide', '');

			/**
			 * Reset all steps to inactive.
			 */
			let allSteps = document.querySelectorAll('.plausible-analytics-wizard-step');
			let activeSteps = document.querySelectorAll('.plausible-analytics-wizard-active-step');
			let completedSteps = document.querySelectorAll('.plausible-analytics-wizard-completed-step');

			for (let i = 0; i < allSteps.length; i++) {
				allSteps[i].classList.remove('hidden');
			}

			for (let i = 0; i < activeSteps.length; i++) {
				activeSteps[i].classList += ' hidden';
			}

			for (let i = 0; i < completedSteps.length; i++) {
				completedSteps[i].classList += ' hidden';
			}

			/**
			 * Mark current step as active.
			 */
			let currentStep = document.getElementById('active-step-' + hash);
			let inactiveCurrentStep = document.getElementById('step-' + hash);

			currentStep.classList.remove('hidden');
			inactiveCurrentStep.classList += ' hidden';

			/**
			 * Mark steps as completed.
			 *
			 * @type {string[]}
			 */
			let currentlyCompletedSteps = currentStep.dataset.completedSteps.split(',');

			/**
			 * Filter empty array elements.
			 * @type {string[]}
			 */
			currentlyCompletedSteps = currentlyCompletedSteps.filter(n => n);

			if (currentlyCompletedSteps.length < 1) {
				return;
			}

			currentlyCompletedSteps.forEach(function (step) {
				let completedStep = document.getElementById('completed-step-' + step);
				let inactiveStep = document.getElementById('step-' + step);

				completedStep.classList.remove('hidden');
				inactiveStep.classList += ' hidden';
			});
		},

		/**
		 * Do AJAX request and (optionally) show a notice or (optionally) reload the page.
		 *
		 * @param data
		 * @param button
		 *
		 * @return object
		 */
		ajax: function (data, button = null) {
			return fetch(
				ajaxurl,
				{
					method: 'POST',
					body: data,
				}
			).then(response => {
				if (button) {
					button.children[0].classList += ' hidden';
					button.removeAttribute('disabled');
				}

				if (response.status === 200) {
					return response.json();
				}

				return false;
			}).then(response => {
				if (response.success === true) {
					if (response.data !== undefined && response.data.message !== undefined) {
						plausible.notice(response.data.message);
					}
				} else {
					if (response.data !== undefined && response.data.message !== undefined) {
						plausible.notice(response.data.message, true);
					}
				}

				let event = new CustomEvent('plausibleAjaxDone', {detail: response});

				document.dispatchEvent(event);

				return response.data;
			});
		},

		/**
		 * Displays a notice or error message.
		 *
		 * @param message
		 * @param isError
		 */
		notice: function (message, isError = false) {
			if (isError === true) {
				document.getElementById('icon-error').classList.remove('hidden');
				document.getElementById('icon-success').classList += ' hidden';
			} else {
				document.getElementById('icon-success').classList.remove('hidden');
				document.getElementById('icon-error').classList += ' hidden';
			}

			let notice = document.getElementById('plausible-analytics-notice');

			document.getElementById('plausible-analytics-notice-text').innerHTML = message;

			notice.classList.remove('hidden');

			setTimeout(function () {
				notice.classList.replace('opacity-0', 'opacity-100');
			}, 200)

			if (isError === false) {
				setTimeout(function () {
					notice.classList.replace('opacity-100', 'opacity-0');
					setTimeout(function () {
						notice.classList += ' hidden';
					}, 200)
				}, 2000);
			}
		}
	}

	plausible.init();
});
