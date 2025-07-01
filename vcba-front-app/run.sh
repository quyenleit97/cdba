#!/bin/bash

# Angular Quick Run Script
# Usage: ./run.sh [option]

echo "🚀 Angular Quick Run Script"
echo "=========================="

# Check if node_modules exists
if [ ! -d "node_modules" ]; then
    echo "📦 Installing dependencies..."
    npm install
fi

# Function to show usage
show_usage() {
    echo "Usage: ./run.sh [option]"
    echo ""
    echo "Options:"
    echo "  start     - Start development server (default)"
    echo "  build     - Build for production"
    echo "  test      - Run tests"
    echo "  clean     - Clean and reinstall dependencies"
    echo "  help      - Show this help message"
    echo ""
    echo "Examples:"
    echo "  ./run.sh        - Start development server"
    echo "  ./run.sh start  - Start development server"
    echo "  ./run.sh build  - Build for production"
    echo "  ./run.sh test   - Run tests"
}

# Function to start development server
start_dev() {
    echo "🔥 Starting Angular development server..."
    echo "📍 Server will be available at: http://localhost:4200"
    echo "⏹️  Press Ctrl+C to stop the server"
    echo ""
    npm start
}

# Function to build for production
build_prod() {
    echo "🏗️  Building for production..."
    npm run build
    echo "✅ Build completed!"
}

# Function to run tests
run_tests() {
    echo "🧪 Running tests..."
    npm test
}

# Function to clean and reinstall
clean_install() {
    echo "🧹 Cleaning node_modules..."
    rm -rf node_modules
    echo "📦 Reinstalling dependencies..."
    npm install
    echo "✅ Clean install completed!"
}

# Main script logic
case "${1:-start}" in
    "start")
        start_dev
        ;;
    "build")
        build_prod
        ;;
    "test")
        run_tests
        ;;
    "clean")
        clean_install
        ;;
    "help"|"-h"|"--help")
        show_usage
        ;;
    *)
        echo "❌ Unknown option: $1"
        echo ""
        show_usage
        exit 1
        ;;
esac 