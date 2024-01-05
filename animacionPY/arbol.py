import math
import random
import time

def print_colored(text, color_code):
    print(f"\033[{color_code}m{text}\033[0m", end="")

def print_tree(size, left):
    j = 1

    for i in range(0, size, 2):
        row = (left + math.ceil(size / 2) - j) * " "
        row += i * "*"
        j += 1

        print_colored(row, "32")
        time.sleep(0.05)  # Añadir un breve retraso para simular la caída de nieve

    row = (left + math.ceil(size / 2) - 3) * " "
    row += 4 * "*"
    print_colored(row, "31")
    time.sleep(0.05)

    print_colored(row, "31")
    time.sleep(0.05)

def simulate_snowfall(num_snowflakes):
    for _ in range(num_snowflakes):
        col = random.randint(1, 80)  # Posición aleatoria en la pantalla
        row = random.randint(1, 25)  # Posición aleatoria en la pantalla
        print(f"\033[{row};{col}H*")  # Imprimir un asterisco en la posición aleatoria
        time.sleep(0.01)

# Tamaño y posición del árbol
size = 40
left = 50

# Imprimir el árbol con efecto de nieve
print_tree(size, left)

# Simular la caída de nieve
simulate_snowfall(100)
