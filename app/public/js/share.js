function share(type){
	var title="常平中学高三级版facemash";
	var rLink="http://zerxon.net";
	var site="http://zerxon.net";
	var pic="http://zerxon.net/app/public/images/site.jpg";
	var summary="";

	if(type=='TSina'){
		shareTSina(title,rLink,site,pic);
	}
	else if(type=="Qzone"){
		shareQzone(title,rLink,summary,site,pic);
	}
	else if(type="DouBan"){
		shareDouBan(title,rLink);
	}
}

/*title是标题，rLink链接，summary内容，site分享来源，pic分享图片路径*/
/*新浪微博*/
function shareTSina(title,rLink,site,pic){
    window.open('http://service.weibo.com/share/share.php?title='+encodeURIComponent(title)+'&url='+encodeURIComponent(rLink)+'&appkey='+encodeURIComponent(site)+'&pic='+encodeURIComponent(pic),'_blank','scrollbars=no,width=600,height=450,left=75,top=20,status=no,resizable=yes')        
}
/*QQ空间*/
function shareQzone(title,rLink,summary,site,pic){
    window.open('http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?title='+encodeURIComponent(title)+'&url='+encodeURIComponent(rLink)+'&summary='+encodeURIComponent(summary)+ '&site='+encodeURIComponent(site)+'&pics='+encodeURIComponent(pic),'_blank','scrollbars=no,width=600,height=450,left=75,top=20,status=no,resizable=yes')
}
/*豆瓣*/
function shareDouBan(title,rLink){
    window.open('http://www.douban.com/recommend?title='+encodeURIComponent(title)+'&url='+encodeURIComponent(rLink),'_blank','scrollbars=no,width=600,height=450,left=75,top=20,status=no,resizable=yes')    
}