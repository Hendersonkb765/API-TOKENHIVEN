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
        "walletBalance": null,
        "createdAt": "11/12/2024 22:36:54",
        "updatedAt": "11/12/2024 22:36:54"
    }
}
```
### Exibir todos os usuários

`[GET] - /api/v1/walletowner/{usuario_id}`

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
            "walletBalance": null,
            "createdAt": "11/12/2024 22:36:54",
            "updatedAt": "11/12/2024 22:36:54"
        },
        {
            "id": 3,
            "name": "Izaq Silva",
            "email": "Izzak23@example.com",
            "walletBalance": null,
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
        "walletBalance": null,
        "createdAt": "11/12/2024 22:36:54",
        "updatedAt": "11/12/2024 22:36:54"
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


# Documentação

A **API TOKENHIVEN** foi desenvolvida para facilitar a criação de moedas virtuais, pontos transferíveis ou outros tipos de marcadores quantitativos. Com esta API, você pode:

- Criar uma carteira individual para cada usuário.
- Permitir transferências de valores entre carteiras de forma prática e segura.

---

## Usuário

### Criar Usuário

`[POST] - /api/v1/walletowner`

Endpoint: [https://tokenhiven.hendersongomes.tech/api/v1/walletsowner](https://tokenhiven.hendersongomes.tech/api/v1/walletsowner)

Descrição: Este endpoint cria um usuário.

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
        "walletBalance": null,
        "createdAt": "11/12/2024 22:36:54",
        "updatedAt": "11/12/2024 22:36:54"
    }
}
```
### Exibir todos os usuários

`[GET] - /api/v1/walletowner/{usuario_id}`

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
            "walletBalance": null,
            "createdAt": "11/12/2024 22:36:54",
            "updatedAt": "11/12/2024 22:36:54"
        },
        {
            "id": 3,
            "name": "Izaq Silva",
            "email": "Izzak23@example.com",
            "walletBalance": null,
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
        "walletBalance": null,
        "createdAt": "11/12/2024 22:36:54",
        "updatedAt": "11/12/2024 22:36:54"
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

