<?php
function num($c) {
    //asc[48-57][0-9] [65-90][A-Z] [96-122][a-z]
    $c1=$c%62;
    $c2=intval($c/62);
    $val="";
    if($c2>0){
        $val.=$c2;
    }
    if($c1<10){
        $val.=chr(ord('0')+$c1);
    }else if($c1<36){
        $c1-=10;
        $val.=chr(ord('a')+$c1);
    }else if($c1<62){
        $c1-=36;
        $val.=chr(ord('A')+$c1);
    }
    return $val;
}
//原始加密后的js代码
$js=<<<SSS
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('O w=[v,u,t,s,r,5,q,4,p,8,9,o,n,l,b,k,7,3,j,6,i,1,h,g,f,e,2,y,c,x,m,z,M,R,0,T,V,P,W,U,S,Q,A,N,L,K,J,I,H,G,F,E,D,C,B],d=a',59,59,'||||||||||55|45|29|icl|38|28|36|39|31|44|26|33|52|18|14|22|47|17|23|50|43|15|pcl|16|20|41|25|12|48|11|40|34|10|42|53|49|27|13|35|19|var|24|46|32|21|54|30|51|37'.split('|'),0,{}));
SSS;
//正则匹配出所有参数
preg_match("|p\}\('(.*?)',(\d*),(\d*),'(.*?)'|i",$js,$matchjs);
$code=$matchjs[1];
//var_dump($matchjs);
$a=$matchjs[2];
$len=$matchjs[3];
$dic=$matchjs[4];
$dic_arr=explode('|',$dic);
var_dump($dic_arr);
for($i=0;$i<=count($dic_arr);$i++){
    $c=num($i);
    var_dump($i,$c);
    if($dic_arr[$i]!=''){
        $code=preg_replace('|\b'.$c.'\b|',$dic_arr[$i],$code);
    }
    
}
//解密后的js代码
$code=str_ireplace("\'","'",$code);
var_dump($code);
