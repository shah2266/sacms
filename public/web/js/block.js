// block.js

document.addEventListener('DOMContentLoaded', function () {
    // Loop through each block dynamically
    // const blocks = ['about_block_one', 'about_block_two', 'about_block_three'];

    blocks.forEach(blockId => {
        const copyButton = document.getElementById(`copy-btn-${blockId}`);
        const editButton = document.getElementById(`edit-btn-${blockId}`);
        const previewButton = document.getElementById(`preview-btn-${blockId}`);
        const previewContainer = document.getElementById(`preview-container-${blockId}`);
        const previewContent = document.getElementById(`preview-content-${blockId}`);
        let preBlock = document.getElementById(`pre-block-${blockId}`);
        let codeBlock = document.getElementById(`code-${blockId}`);

        // Copy functionality
        function copyCode() {
            const range = document.createRange();
            range.selectNodeContents(codeBlock);
            const selection = window.getSelection();
            selection.removeAllRanges();
            selection.addRange(range);

            try {
                document.execCommand('copy');
                copyButton.textContent = 'Copied!';
                setTimeout(() => { copyButton.textContent = 'Copy'; }, 2000);
            } catch (err) {
                console.error('Error copying:', err);
                alert('Failed to copy, please try again.');
            }
        }

        // Edit functionality (Convert <pre><code> to <textarea>)
        function editCode() {
            const currentCode = codeBlock.textContent;

            // Replace <pre><code> with <textarea>
            const textarea = document.createElement('textarea');
            textarea.value = currentCode;
            textarea.style.height = preBlock.offsetHeight + "px"; // Maintain height
            preBlock.replaceWith(textarea);

            // Change "Edit" to "Save"
            editButton.textContent = 'Save';
            editButton.removeEventListener('click', editCode); // Remove old edit event
            editButton.addEventListener('click', function saveCode() {
                const newCode = textarea.value;

                // Recreate <pre><code> structure
                const newPre = document.createElement('pre');
                newPre.className = 'line-numbers'; // Ensure line numbers remain
                newPre.style.minHeight = "200px"; // Prevent compression
                newPre.id = `pre-block-${blockId}`;

                const newCodeElement = document.createElement('code');
                newCodeElement.className = 'language-html';
                newCodeElement.id = `code-${blockId}`;
                newCodeElement.textContent = newCode;

                newPre.appendChild(newCodeElement);
                textarea.replaceWith(newPre);

                // Update references
                preBlock = newPre;
                codeBlock = newCodeElement;

                // Reapply Prism.js highlighting
                Prism.highlightElement(newCodeElement);

                // Rebind copy button
                copyButton.removeEventListener('click', copyCode);
                copyButton.addEventListener('click', copyCode);

                // Change "Save" back to "Edit"
                editButton.textContent = 'Edit';
                editButton.removeEventListener('click', saveCode); // Remove save event
                editButton.addEventListener('click', editCode); // Reattach edit event
            });
        }

        // Preview functionality (Inline)
        function previewCode() {
            // Set preview content to the HTML code inside the block
            previewContent.innerHTML = codeBlock.textContent;

            // Toggle the preview container visibility
            if (previewContainer.style.display === 'none') {
                previewContainer.style.display = 'block';
            } else {
                previewContainer.style.display = 'none';
            }
        }

        // Add a delay before calling Prism.highlightAll
        setTimeout(function() {
            Prism.highlightElement(codeBlock);
        }, 100); // 100ms delay to allow the page to fully render

        // Initial event listeners
        copyButton.addEventListener('click', copyCode);
        editButton.addEventListener('click', editCode);
        previewButton.addEventListener('click', previewCode); // Add preview functionality
    });
});
