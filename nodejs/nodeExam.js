//const http = require('http');
 
//http 모듈을 사용한다는 의미
const http = require('http');
 
http.createServer( (req,res)=>{
  res.writeHead(200, {'Content-Type':'text/plain; charset=utf-8'});
  res.end('Hello Nodejs 입니다');
}).listen(22222,'127.0.0.1');
// listem(port , host);
 
console.log('server running at http://127.0.0.1');

