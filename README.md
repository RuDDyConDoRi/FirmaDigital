> #Descripción#

Esta es una libreria escrita en __PHP__ Para Firmas Digitales: 

Probando la Funcionalidad:

*  La firma de un documento de ejemplo se realizo de la siguiente manera:

> > ``$ openssl dgst -c -sign`` __``privada.key`` -out ``firmado.sig archivo.txt``__ 


*  La verificacion de un documento de ejemplo se realizo de la siguiente manera:

> > ``$ openssl dgst -c -verify`` __``publica.key``__ -signature __``firmado.sig``__ __``archivo.txt``__

> donde: __``firmado.sig``__ es el archivo que almacena la firma digital.