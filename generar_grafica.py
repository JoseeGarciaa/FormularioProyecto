import matplotlib.pyplot as plt
from consulta_mysql import obtener_datos

def generar_grafica():
    # Obtener los datos
    df = obtener_datos()

    # Verificar las columnas
    print(df.columns)

    # Crear una gráfica
    plt.figure(figsize=(10, 6))
    plt.bar(df['Materia'], df['Cantidad'])
    plt.title('Cantidad de Registros por Materia')
    plt.xlabel('Materia')
    plt.ylabel('Cantidad')
    plt.xticks(rotation=45)
    plt.grid(True)
    
    # Guardar la gráfica como un archivo
    plt.savefig('grafica.png')

if __name__ == "__main__":
        generar_grafica()
