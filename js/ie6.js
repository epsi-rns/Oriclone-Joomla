// http://davidwalsh.name/preventing-css-background-flicker 
try { document.execCommand('BackgroundImageCache', false, true); } catch(e) {}


// all ie
document.ondragstart = function () { return false; };
