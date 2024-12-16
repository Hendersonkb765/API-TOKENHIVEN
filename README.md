# Documentação

A **API TOKENHIVEN** foi desenvolvida para facilitar a criação de moedas virtuais, pontos transferíveis ou outros tipos de marcadores quantitativos. Com esta API, você pode:

- Criar uma carteira individual para cada usuário.
- Permitir transferências de valores entre carteiras de forma prática.

---

## Carteira

### Criar Carteira

`[POST] - /api/v1/wallet`

Endpoint: https://tokenhiven.hendersongomes.tech/api/v1/wallets

Descrição: Este endpoint cria uma carteira para o usuario.

#### Exemplo de Requisição
```json
Content-Type: application/json

{
    "from":"8050540c7ecdcccf3f1b2e94f888cfa35197fcc5ea2c36865c1d767379c6e2fd",
    "to":"$2y$12$hjxeaRSZg.XZW3wbW2d8Nua4nQB2dsqGVim.hEsxFLA9kWykh664a", 
    "amount":21
}
```

#### Exemplo de Resposta
```json
Content-Type: application/json

{
    "message": "Wallet created successfully",
    "status": 201,
    "data": {
        "id": 13,
        "walletAddress": "$2y$12$hjxeaRSZg.XZW3wbW2d8Nua4nQB2dsqGVim.hEsxFLA9kWykh664a",
        "amount": 0
    }
}
```

### Exibir todas as carteiras 
 
`[GET] - /api/v1/wallet`

Endpoint: https://tokenhiven.hendersongomes.tech/api/v1/wallets

Descrição: Este endpoint exibi todas as carteiras.

#### Exemplo de Resposta
```json
Content-Type: application/json

{
    "message": "ok",
    "status": 200,
    "data": [
        {
            "id": 1,
            "walletAddress": "186760d7228ab09c611606fdcfc64432c25e0e8feccf1f1b9ee674ae87e9ab76",
            "amount": 1936
        },
        {
            "id": 2,
            "walletAddress": "c39edff21af83de9db028cc294bdd5631ae642c914c6eddca7193f54edf3d1d4",
            "amount": 9049
        }
}
```

### Exibir Cateira Pelo ID

`[GET] - /api/v1/wallets`

Endpoint: https://tokenhiven.hendersongomes.tech/api/v1/wallets/{wallet_id}

Descrição: Este endpoint exibi todas as carteiras.

#### Exemplo de Resposta
```json
Content-Type: application/json

{
    "message": "ok",
    "status": 200,
    "data": [
        {
            "id": 1,
            "walletAddress": "186760d7228ab09c611606fdcfc64432c25e0e8feccf1f1b9ee674ae87e9ab76",
            "amount": 1936
        },
        {
            "id": 2,
            "walletAddress": "c39edff21af83de9db028cc294bdd5631ae642c914c6eddca7193f54edf3d1d4",
            "amount": 9049
        }
}
```

## Transferências

### Fazer Transferência

`[POST] - /api/v1/wallet-transfer`

Endpoint: https://tokenhiven.hendersongomes.tech/api/v1/wallet-transfer

Descrição: Este endpoint exibi todos os históricos.

#### Exemplo de Requisição
```json
Content-Type: application/json

{
    "message": "Validation error",
    "status": 422,
    "errors": {
        "from": [
            "O campo from selecionado é inválido.",
            "Wallet not found"
        ],
        "to": [
            "O campo to selecionado é inválido."
        ]
    },
    "data": []
}
```

#### Exemplo de Resposta
```json
Content-Type: application/json

{
    "message": "ok",
    "status": 200,
    "data": {
        "transferHistory": [
            {
                "amount": 4193,
                "sendBy": {
                    "id": 1,
                    "Address": "48433dbb90f995328e7bb23fc11f7d499d4c94aeb8a73f51ef178fae8e07119d"
                },
                "receivedBy": {
                    "id": 6,
                    "Address": "bcd212f5fd155ba7e782983fa9b0bd1b9fdb50f6b7e8dbd6daeb5cee19bf2a94"
                }
            },
            {
                "amount": 8300,
                "sendBy": {
                    "id": 2,
                    "Address": "8050540c7ecdcccf3f1b2e94f888cfa35197fcc5ea2c36865c1d767379c6e2fd"
                },
                "receivedBy": {
                    "id": 9,
                    "Address": "71639fa5fe416bfbf29e0bbe21981033bc2e582783a826c15739783c6d78630d"
                }
            },
}
```

### Exibir Todas as Transferências 

`[GET] - /api/v1/wallet-transfer`

Endpoint: https://tokenhiven.hendersongomes.tech/api/v1/wallet-transfer

Descrição: Este endpoint exibi todos os históricos.

#### Exemplo de Resposta
```json
Content-Type: application/json

{
    "message": "ok",
    "status": 200,
    "data": {
        "transferHistory": [
            {
                "amount": 4193,
                "sendBy": {
                    "id": 1,
                    "Address": "48433dbb90f995328e7bb23fc11f7d499d4c94aeb8a73f51ef178fae8e07119d"
                },
                "receivedBy": {
                    "id": 6,
                    "Address": "bcd212f5fd155ba7e782983fa9b0bd1b9fdb50f6b7e8dbd6daeb5cee19bf2a94"
                }
            },
            {
                "amount": 8300,
                "sendBy": {
                    "id": 2,
                    "Address": "8050540c7ecdcccf3f1b2e94f888cfa35197fcc5ea2c36865c1d767379c6e2fd"
                },
                "receivedBy": {
                    "id": 9,
                    "Address": "71639fa5fe416bfbf29e0bbe21981033bc2e582783a826c15739783c6d78630d"
                }
            },
}
```

### Exibir Transfêrencia Pelo ID 

`[GET] - /api/v1/wallet-transfer/{historic_id}`

Endpoint: https://tokenhiven.hendersongomes.tech/api/v1/wallet-transfer/{historic_id}

Descrição: Este endpoint exibi histórico com base no id.

#### Exemplo de Resposta
```json
Content-Type: application/json

{
    "message": "ok",
    "status": 200,
    "data": {
        "transferHistory": [
            {
                "amount": 4193,
                "sendBy": {
                    "id": 1,
                    "Address": "48433dbb90f995328e7bb23fc11f7d499d4c94aeb8a73f51ef178fae8e07119d"
                },
                "receivedBy": {
                    "id": 6,
                    "Address": "bcd212f5fd155ba7e782983fa9b0bd1b9fdb50f6b7e8dbd6daeb5cee19bf2a94"
                }
            },
            {
                "amount": 8300,
                "sendBy": {
                    "id": 2,
                    "Address": "8050540c7ecdcccf3f1b2e94f888cfa35197fcc5ea2c36865c1d767379c6e2fd"
                },
                "receivedBy": {
                    "id": 9,
                    "Address": "71639fa5fe416bfbf29e0bbe21981033bc2e582783a826c15739783c6d78630d"
                }
            },
}
```





