<?php
/*
Template Name: FAQ Page
*/
remove_filter('the_content', 'wpautop');
get_header();
?>
<h1 class="text-center page-title"><?php echo the_title(); ?></h1>
<div class="container">
	<div class="wrapper-container">
		<div class="faq-container" id="faq-container"></div>
	</div>
</div>

<script>
	// Parse CSV string into an array of objects
	function parseCSV(csvText) {
		const lines = csvText.trim().split('\n');
		const headers = lines[0].split(',').map(header => header.trim());
		const faqs = [];

		for (let i = 1; i < lines.length; i++) {
			const regex = /("(?:[^"]|"")*"|[^,\n]*)(?:,|\n|$)/g;
			const matches = lines[i].match(regex).map(field =>
				field.replace(/^"|"$/g, '').replace(/""/g, '"').replace(/,+$/, '').trim()
			);
			if (matches.length >= 2) {
				faqs.push({
					question: matches[0],
					answer: matches[1]
				});
			}
		}
		return faqs;
	}

	// Render FAQs as HTML with accordion functionality
	function renderFAQs(faqs) {
		const container = document.getElementById('faq-container');
		container.innerHTML = '';

		faqs.forEach(faq => {
			const faqItem = document.createElement('div');
			faqItem.className = 'faq-item';

			const faqQuestion = document.createElement('div');
			faqQuestion.className = 'faq-question';
			const questionText = document.createElement('p');
			questionText.textContent = faq.question;
			faqQuestion.appendChild(questionText);

			const faqToggle = document.createElement('span');
			faqToggle.className = 'faq-toggle';
			faqQuestion.appendChild(faqToggle);

			const faqAnswer = document.createElement('div');
			faqAnswer.className = 'faq-answer';

			if (faq.answer.includes(';')) {
				const parts = faq.answer.split(/;(?=\s)/);
				const ul = document.createElement('ul');
				let hasList = false;

				parts.forEach(part => {
					const trimmedPart = part.trim();
					if (trimmedPart) {
						if (trimmedPart.includes(':')) {
							const [subheading, ...rest] = trimmedPart.split(':');
							if (subheading.trim()) {
								const subhead = document.createElement('p');
								subhead.textContent = subheading.trim() + ':';
								faqAnswer.appendChild(subhead);
							}
							if (rest.join(':').trim()) {
								const li = document.createElement('li');
								li.textContent = rest.join(':').trim();
								ul.appendChild(li);
								hasList = true;
							}
						} else {
							const li = document.createElement('li');
							li.textContent = trimmedPart;
							ul.appendChild(li);
							hasList = true;
						}
					}
				});

				if (hasList) {
					faqAnswer.appendChild(ul);
				}
			} else {
				const answerText = document.createElement('p');
				answerText.textContent = faq.answer;
				faqAnswer.appendChild(answerText);
			}

			faqItem.appendChild(faqQuestion);
			faqItem.appendChild(faqAnswer);
			container.appendChild(faqItem);

			// Add accordion toggle functionality
			faqQuestion.addEventListener('click', () => {
				const isActive = faqAnswer.classList.contains('active');
				// Close all other answers
				document.querySelectorAll('.faq-answer.active').forEach(answer => {
					answer.classList.remove('active');
					answer.previousElementSibling.classList.remove('active');
					answer.previousElementSibling.querySelector('.faq-toggle').classList.remove('active');
				});
				// Toggle current answer
				if (!isActive) {
					faqAnswer.classList.add('active');
					faqQuestion.classList.add('active');
					faqToggle.classList.add('active');
				}
			});
		});
	}

	// Fetch and process the CSV file
	async function loadFAQs() {
		try {
			const response = await fetch('/wp-content/themes/imagine-landscape/faqs.csv');
			if (!response.ok) {
				throw new Error('Failed to load CSV file');
			}
			const csvText = await response.text();
			const faqs = parseCSV(csvText);
			renderFAQs(faqs);
		} catch (error) {
			console.error('Error loading FAQs:', error);
			const container = document.getElementById('faq-container');
			container.innerHTML = '<p>Error loading FAQs. Please try again later.</p>';
		}
	}

	window.onload = loadFAQs;
</script>

<?php
if (have_rows('flexible_content')):
	while (have_rows('flexible_content')):
		the_row();
		if (get_row_layout() == 'cta'):
			get_template_part('template-parts/cta');
		endif;
	endwhile;
else:
	echo '<p>No content found.</p>';
endif;
?>

<?php get_footer(); ?>