import matplotlib.pyplot as plt
from consulta_mysql import obtener_datos

def generar_grafica():
    # Obtener los datos
    df = obtener_datos()

    # Crear una gráfica
    plt.figure(figsize=(10, 6))
    plt.plot(df['columna_x'], df['columna_y'], marker='o')
    plt.title('Título de la gráfica')
    plt.xlabel('Etiqueta del eje X')
    plt.ylabel('Etiqueta del eje Y')
    plt.grid(True)
    plt.show()

if __name__ == "__main__":
    generar_grafica()
