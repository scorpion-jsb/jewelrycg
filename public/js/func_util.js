function copyText(element)
{
    navigator.clipboard.writeText(element.textContent);
    alert('Tracking number copied!');
}