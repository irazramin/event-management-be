# Use the official Nginx base image
FROM nginx:latest

# Copy custom Nginx configuration
COPY ./docker/nginx/default.conf /etc/nginx/conf.d/default.conf

# Copy application source files to Nginx document root
COPY ./src /var/www/html

# Expose port 80
EXPOSE 80

# Start Nginx
CMD ["nginx", "-g", "daemon off;"]
