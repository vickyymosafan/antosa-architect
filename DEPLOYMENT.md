# Deployment Guide - Antosa Architect

## 🚀 Deploy via GitHub ke Vercel (Recommended)

### Prerequisites
1. GitHub account
2. Vercel account (bisa login dengan GitHub)

### Deployment Steps

#### 1. **Setup GitHub Repository**

1. **Initialize Git** (jika belum):
   ```bash
   cd c:\xampp\htdocs\antosa-architect
   git init
   ```

2. **Add files to Git**:
   ```bash
   git add .
   git commit -m "Initial commit: Antosa Architect website"
   ```

3. **Create GitHub Repository**:
   - Buka [GitHub.com](https://github.com)
   - Click "New repository"
   - Repository name: `antosa-architect`
   - Set to Public atau Private
   - Jangan centang "Initialize with README" (karena sudah ada)
   - Click "Create repository"

4. **Push to GitHub**:
   ```bash
   git remote add origin https://github.com/YOUR_USERNAME/antosa-architect.git
   git branch -M main
   git push -u origin main
   ```

#### 2. **Connect GitHub ke Vercel**

1. **Login ke Vercel**:
   - Buka [vercel.com](https://vercel.com)
   - Login dengan GitHub account

2. **Import Project**:
   - Click "New Project"
   - Select "Import Git Repository"
   - Pilih repository `antosa-architect`
   - Click "Import"

3. **Configure Project**:
   - Project Name: `antosa-architect`
   - Framework Preset: `Other`
   - Root Directory: `./` (default)
   - Build Command: (leave empty)
   - Output Directory: (leave empty)
   - Install Command: (leave empty)

4. **Deploy**:
   - Click "Deploy"
   - Wait for deployment to complete

### 📁 File Konfigurasi

#### `vercel.json`
```json
{
  "functions": {
    "public/index.php": {
      "runtime": "vercel-php@0.6.0"
    }
  },
  "routes": [
    {
      "src": "/assets/(.*)",
      "dest": "/public/assets/$1"
    },
    {
      "src": "/(.*\\.(css|js|png|jpg|jpeg|gif|svg|ico|woff|woff2|ttf|eot))",
      "dest": "/public/$1"
    },
    {
      "src": "/(.*)",
      "dest": "/public/index.php"
    }
  ]
}
```

#### 3. **Automatic Deployments**

Setelah setup, setiap kali Anda push ke GitHub:
```bash
git add .
git commit -m "Update website"
git push origin main
```

Vercel akan otomatis:
- ✅ Detect perubahan di GitHub
- ✅ Build dan deploy website
- ✅ Update live URL

### ✅ Fitur yang Sudah Dikonfigurasi

- ✅ PHP Runtime support (`vercel-php@0.6.0`)
- ✅ Static assets routing (CSS, JS, Images)
- ✅ Dynamic site URL detection
- ✅ Environment-aware routing
- ✅ Optimized file exclusion
- ✅ GitHub integration ready
- ✅ Auto-deployment on push

### 🔧 Environment Variables (Optional)

Di Vercel dashboard → Settings → Environment Variables:
- `SITE_NAME`: Antosa Architect
- `COMPANY_EMAIL`: info@antosa-architect.com
- `COMPANY_PHONE`: +62 851 8952 3863

### 📝 Notes

1. **Database**: Jika menggunakan database, pertimbangkan menggunakan:
   - PlanetScale (MySQL)
   - Supabase (PostgreSQL)
   - MongoDB Atlas

2. **File Uploads**: Untuk file uploads, gunakan:
   - Cloudinary
   - AWS S3
   - Vercel Blob

3. **Custom Domain**: Setelah deploy, Anda bisa menambahkan custom domain di Vercel dashboard.

### 🚨 Troubleshooting

- Jika ada error 404, pastikan routing di `vercel.json` sudah benar
- Jika static assets tidak load, periksa path di `public/assets/`
- Untuk debugging, gunakan `vercel logs` untuk melihat server logs
