
var codeUA = '{UA}';
var codeGA = '{GA}';
var codeGTM = '{GTM}';
var matomoId = '{matomo-id}';

if(codeUA && codeUA != 'UA-'){
    tarteaucitron.user.analyticsUa = codeUA;
    tarteaucitron.user.analyticsMore = function () { /* add here your optionnal ga.push() */ };
    (tarteaucitron.job = tarteaucitron.job || []).push('analytics');
}

if (codeGA && codeGA != "G-") {
        tarteaucitron.user.gtagUa = codeGA;
        /* tarteaucitron.user.gtagCrossdomain = ['example.com', 'example2.com']; */
        tarteaucitron.user.gtagMore = function () { /* add here your optionnal gtag() */ };
        (tarteaucitron.job = tarteaucitron.job || []).push("gtag");
}

if (codeGTM && codeGTM != "GTM-") {
    tarteaucitron.user.googletagmanagerId = codeGTM;
    (tarteaucitron.job = tarteaucitron.job || []).push("googletagmanager");
}

if(matomoId){
    tarteaucitron.user.matomoId = matomoId;
    tarteaucitron.user.matomoHost = "{matomo-host}";
    (tarteaucitron.job = tarteaucitron.job || []).push('matomo');
}
