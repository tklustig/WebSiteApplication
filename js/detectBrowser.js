function detect() {
    var BrowserIs;
    if ((window.navigator.userAgent.indexOf("Opera") || navigator.userAgent.indexOf('OPR')) != -1)
        BrowserIs = "Opera";
    else if (window.navigator.userAgent.indexOf("Chrome") != -1)
        BrowserIs = "Chrome";
    else if (navigator.userAgent.indexOf("Safari") != -1)
        BrowserIs = "Safari";
    else if (window.navigator.userAgent.indexOf("Firefox") != -1)
        BrowserIs = "Firefox";
    else if ((window.navigator.userAgent.indexOf("MSIE") != -1) || (!!document.documentMode == true)) //IF IE > 10
        BrowserIs = "Internet Explorer";
    else if (window.navigator.userAgent.indexOf("Edge/") > -1)
        BrowserIs = "Edge";
    else
        BrowserIs = "Unknown Browser";

    return BrowserIs;
}


