# pert 13 membuat menambahkan payment dan REEST CLIENT
```
CREATE
- payment -mcfs 
- REST CLIENT
```

# composer package midtrans
```
composer requiere midtrans/midtrans-php
```

# tambahin app file nya 
```plaintext
|-- app
|   |-- config
|   |   |-- midtrans.php
|   |   
```

# selanjutnya pada env set : 
```
ENV : 
MIDTRANS_MERCHANT_ID={{ your-merchant-id }}
MIDTRANS_SERVER_KEY={{ your-server-key }}
MIDTRANS_CLIENT_KEY={{ your-client-key }}
```




