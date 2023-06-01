import time
from Crypto.PublicKey import RSA
from Crypto.Cipher import PKCS1_OAEP

# Função para cifrar o texto usando RSA
def encrypt_rsa(text, key):
    cipher = PKCS1_OAEP.new(key)
    ciphertext = cipher.encrypt(text.encode())
    return ciphertext

# Texto a ser cifrado
plaintext = "RSA: algoritmo dos professores do MIT: Rivest, Shamir e Adleman"

# Tamanhos de chave a serem testados
key_sizes = [1024, 2048, 4096, 8192]

# Cifrar o texto usando RSA com diferentes tamanhos de chave
for key_size in key_sizes:
    print(f"Cifragem com chave de {key_size} bits:")
    private_key = RSA.generate(key_size)
    public_key = private_key.publickey()

    # Executar 5 vezes para cada tamanho de chave
    for i in range(5):
        start_time = time.time()

        # Cifrar o texto
        ciphertext = encrypt_rsa(plaintext, public_key)

        end_time = time.time()
        elapsed_time = end_time - start_time

        print(f"Tempo de execução {i+1}: {elapsed_time} segundos")

    print()  # Quebra de linha entre os tamanhos de chave