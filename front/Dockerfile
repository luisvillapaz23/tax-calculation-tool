# Etapa 1: Construir la aplicación
FROM node:18 as build

WORKDIR /app

# Copia los archivos necesarios para instalar dependencias
COPY package*.json ./
RUN npm install

# Copia todo el proyecto
COPY . .

# Ejecuta el build y verifica el contenido de dist
RUN npm run build

# Etapa 2: Servir con Nginx
FROM nginx:alpine

COPY --from=build /app/build /usr/share/nginx/html

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]
