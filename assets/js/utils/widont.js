// Prevent widows

export default function widont () {
    // This works as long as the last word is tag free (e.g. the last word is not a link, abbr, etc.)
    // Add acceptable punctuation to the regex as needed but avoid angle brackets <>
    const element = document.querySelectorAll('.widont');
    for (let i = 0; i < element.length; ++i) {
        const p = element[i];
        p.innerHTML = p.innerHTML.replace(/\s([\w.?!-()]+?)$/, '&nbsp;$1');
    }

    const children = document.querySelectorAll('.widont p');
    for (let i = 0; i < children.length; ++i) {
        const p = children[i];
        p.innerHTML = p.innerHTML.replace(/\s([\w.?!-()]+?)$/, '&nbsp;$1');
    }
}
