function copyToClipboard(text) {
    window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
}
function G_formatBytes(bytes) { 
    units = ['B', 'KB', 'MB', 'GB', 'TB'];

    bytes = Math.max(bytes, 0);
    pow = Math.floor((bytes ? Math.log(bytes) : 0) / Math.log(1024));
    pow = Math.min(pow, units.length - 1);

    // Uncomment one of the following alternatives
    bytes = bytes / Math.pow(1024, pow);
    // $bytes /= (1 << (10 * $pow)); 

    return (Math.round(bytes*100)/100) + ' ' + units[pow];
}