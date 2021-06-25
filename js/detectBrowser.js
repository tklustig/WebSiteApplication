function detect() {

    var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
// Firefox 1.0+
    var isFirefox = typeof InstallTrigger !== 'undefined';
// Safari 3.0+ "[object HTMLElementConstructor]" 
    var isSafari = /constructor/i.test(window.HTMLElement) || (function (func) {
        return func.toString() === "[object SafariRemoteNotification]";
    }
    )(!window['safari'] || (typeof safari !== 'undefined' && window['safari'].pushNotification));
// Edge 20+
    var isEdge = !!window.StyleMedia;
// Chrome 1 - 79
    var isChrome = !!window.chrome && (!!window.chrome.webstore || !!window.chrome.runtime);
// Edge (based on chromium) detection
    var isChromium = isChrome && (navigator.userAgent.indexOf("Edg") != -1);

    var BrowserIs;

    if (isOpera)
        BrowserIs = 'Opera is used surfing in WWW!';
    else if (isFirefox)
        BrowserIs = 'Firefox is used surfing in WWW!';
    else if (isSafari)
        BrowserIs = 'Safari is used surfing in WWW!';
    else if (isEdge)
        BrowserIs = 'Edge is used surfing in WWW!';
    else if (isChrome)
        BrowserIs = 'Google Chrome is used surfing in WWW!';
    else if (isChromium)
        BrowserIs = 'Chromium/Linux is used surfing in WWW!';
    return BrowserIs;
}


