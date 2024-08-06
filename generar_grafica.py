import matplotlib.pyplot as plt
from consulta_mysql import obtener_datos

def generar_grafica():
    # Obtener los datos
    df = obtener_datos()

    # Verificar las columnas
    print(df.columns)

    # Crear una gráfica
    plt.figure(figsize=(14, 8))  # Aumentar el tamaño de la figura
    plt.bar(df['Materia'], df['Cantidad'])
    plt.title('Cantidad de Registros por Materia')
    plt.xlabel('Materia')
    plt.ylabel('Cantidad')
    
    # Rotar las etiquetas y ajustar espaciado
    plt.xticks(rotation=60, ha='right', fontsize=10, padding=5)  # Rotar a 60 grados y alinear a la derecha
    plt.grid(True)
    
    # Ajustar el espaciado entre los elementos de la gráfica
    plt.subplots_adjust(bottom=0.25)  # Aumentar el espaciado en la parte inferior

    plt.tight_layout()  # Ajustar automáticamente el layout
    
    # Guardar la gráfica como un archivo
    plt.savefig('grafica.png')

if __name__ == "__main__":
    generar_grafica() 
