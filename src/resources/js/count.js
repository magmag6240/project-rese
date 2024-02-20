
function wordCount(val) {
    return {
        charactersNoSpaces: val.replace(/\s+/g, '').length,
        characters: val.length,
        lines: val.split(/\r*\n/).length
    };
}

const textarea = document.getElementById('comments');
const charCounting = document.getElementById('charCounting');
textarea.addEventListener('keyup', () => {
    console.log(textarea.value);
    let wc = wordCount(textarea.value);
    charCounting.innerText = wc.charactersNoSpaces;
});