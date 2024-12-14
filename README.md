# Documentação

A **API TOKENHIVEN** foi desenvolvida para facilitar a criação de moedas virtuais, pontos transferíveis ou outros tipos de marcadores quantitativos. Com esta API, você pode:

- Criar uma carteira individual para cada usuário.
- Permitir transferências de valores entre carteiras de forma prática.

---

## Usuário

### Criar Usuário

`[POST] - /api/v1/walletowner`

Endpoint: [https://tokenhiven.hendersongomes.tech/api/v1/walletsowner](https://tokenhiven.hendersongomes.tech/api/v1/walletsowner)

Descrição: Este endpoint cria um usuário e a carteira associado a ele.

#### Exemplo de Requisição

```json
Content-Type: application/json

{
  "name": "John Doe",
  "email": "john.doe@example.com",
  "password": "securepassword"
}
```
#### Exemplo de resposta
```json
Content-Type: application/json
{
    "message": "User created successfully",
    "status": 201,
    "data": {
        "id": 2,
        "name": "John Doe",
        "email": "john.doe@example.com",
        "createdAt": "11/12/2024 22:36:54",
        "updatedAt": "11/12/2024 22:36:54"
    }
}
```
### Exibir todos os usuários

`[GET] - /api/v1/walletowner`

Endpoint: https://tokenhiven.hendersongomes.tech/api/v1/walletsowner

Descrição: Este endpoint exibi todos os usuários.

#### Exemplo de resposta
```json
Cotent-Type: application/json

{
    "message": "ok",
    "status": 200,
    "data": [
        {
            "id": 2,
            "name": "John Doe",
            "email": "john.doe@example.com",
            "createdAt": "11/12/2024 22:36:54",
            "updatedAt": "11/12/2024 22:36:54"
        },
        {
            "id": 3,
            "name": "Izaq Silva",
            "email": "Izzak23@example.com",
            "createdAt": "12/12/2024 00:05:49",
            "updatedAt": "12/12/2024 00:05:49"
        }
    ]
}
```



### Exibir usuário

`[GET] - /api/v1/walletowner/{usuario_id}`

Endpoint: https://tokenhiven.hendersongomes.tech/api/v1/walletsowner/{user_id}

Descrição: Este endpoint exibir um usuario que tenha o id correspondente ao que foi passado na url.

#### Exemplo de resposta
```json 
Content-Type: application/json
{
    "message": "ok",
    "status": 200,
    "data": {
        "id": 2,
        "name": "John Doe",
        "email": "john.doe@example.com",
        "createdAt": "11/12/2024 22:36:54",
        "updatedAt": "11/12/2024 22:36:54"
    }
}
```
### Atualizar Usuário
`[PUT] - /api/v1/walletowner/{user_id}`
Endpoint: https://tokenhiven.hendersongomes.tech/api/v1/walletsowner/{usuario_id}

Descrição: Este endpoint atualiza um usuário.

#### Exemplo de Requisição

```json
Content-Type: application/json

{
    "name": "João Souza"
}
```

#### Exemplo de Reposta
```json
Content-Type: application/json

{
    "message": "User updated successfully",
    "status": 200,
    "data": {
        "id": 2,
        "name": "Izaq Silva",
        "email": "john.doe@example.com",
        "createdAt": "11/12/2024 22:36:54",
        "updatedAt": "14/12/2024 04:56:57"
    }
}
```

### Deletar Usuário

`[DELETE] - /api/v1/walletowner/{user_id}`

Endpoint: https://tokenhiven.hendersongomes.tech/api/v1/walletsowner/{usuario_id}

Descrição: Este endpoint exclui um usuário.

#### Exemplo de resposta
```json
Content-Type: application/json

{
    "message": "User deleted successfully",
    "status": 200,
    "data": []
}
```

## Carteira

### Exibir todas as carteiras 

`[GET] - /api/v1/wallet`

Endpoint: https://tokenhiven.hendersongomes.tech/api/v1/wallet

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

### Criar Carteira

Endpoint: https://tokenhiven.hendersongomes.tech/api/v1/wallet

Descrição: Este endpoint cria uma carteira para o usuario.

#### Exemplo de Requisição
```json
Content-Type: application/json

{
    "ownerId":11
}
```
#### Exemplo de Resposta
```json
Content-Type: application/json

{
    "message": "Wallet created successfully",
    "status": 201,
    "data": {
        "id": 1,
        "walletAddress": "$2y$12$37vVZ8GTYZWZ9gwLUIiNNurmStI4Ntzks6MT6j2Q5iCNSKoXyvCIS",
        "amount": 0
    }
}
```
