<?php
include 'db_connect.php';

$profile_query = $conn->query("SELECT * FROM profile LIMIT 1");
$profile = $profile_query->fetch_assoc();

$experience_query = $conn->query("SELECT * FROM experiences");
$experiences = [];
while ($row = $experience_query->fetch_assoc()) {
    $experiences[] = $row;
}

$skills_query = $conn->query("SELECT * FROM skills");
$skills = [];
while ($row = $skills_query->fetch_assoc()) {
    $skills[] = $row;
}

$certs_query = $conn->query("SELECT * FROM certificates");
$certificates = [];
while ($row = $certs_query->fetch_assoc()) {
    $certificates[] = $row;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Web Portfolio <?php echo $profile['name']; ?> </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div id="app">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#">Lutpi</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navMenu">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">About Me</a></li>
                        <li class="nav-item"><a class="nav-link" href="#certificates">Certificates</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Home -->
        <section id="home" class="hero d-flex align-items-center">
            <div class="container text-center">
                <div class="profile-img-container">
                    <img src="<?php echo $profile['profile_image']; ?>" class="profile-img" alt="Foto Profil">
                </div>
                <h1 class="fw-bold">Halo, Saya {{ name }}</h1>
                <p class="lead text-secondary">{{ tagline }}</p>
                <a href="#about" class="btn btn-primary mt-3">Tentang Saya</a>
            </div>
        </section>

        <!-- About -->
        <section id="about" class="section-padding">
            <div class="container">
                <h2 class="section-title">About Me</h2>

                <div class="row mt-4">
                    <div class="col-lg-6">
                        <p>
                            <?php echo $profile['about_text']; ?>
                        </p>

                        <h5 class="mt-4">Pengalaman</h5>
                        <ul>
                            <?php foreach ($experiences as $exp): ?>
                                <li><?php echo $exp['title']; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="col-lg-6">
                        <h5>Skills</h5>

                        <div v-for="skill in skills" :key="skill.id" class="mb-3">
                            <div class="d-flex justify-content-between">
                                <span>{{ skill.name }}</span>
                                <span>{{ skill.level }}%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-primary" :style="{ width: skill.level + '%' }">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <!-- Certificates -->
        <section id="certificates" class="section-padding bg-dark-secondary">
            <div class="container">
                <h2 class="section-title text-center">Certificates</h2>

                <div class="row mt-4">
                    <div class="col-md-6 mb-4" v-for="cert in certificates" :key="cert.id">
                        <div class="card certificate-card h-100" @click="showFullCert(cert)">
                            <img :src="cert.image" class="card-img-top cert-img" :alt="cert.title">
                            <div class="card-body">
                                <h5 class="card-title text-white">{{ cert.title }}</h5>
                                <p class="card-text text-light opacity-75">{{ cert.issuer }}</p>
                                <span class="badge bg-primary">{{ cert.year }}</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <footer class="text-center py-4">
            <small>© 2026 <?php echo $profile['name']; ?> | @lutpiiii.__</small>
        </footer>

        <!-- Modal -->
        <div class="modal fade" id="certModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-white">{{ selectedCert.title }}</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img :src="selectedCert.image" class="modal-img-full" alt="Full Certificate">
                        <p class="mt-3 text-secondary">{{ selectedCert.issuer }} ({{ selectedCert.year }})</p>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

    <script>
        const { createApp } = Vue;

        createApp({
            data() {
                return {
                    name: "<?php echo $profile['name']; ?>",
                    tagline: "<?php echo $profile['tagline']; ?>",
                    selectedCert: {},
                    skills: <?php echo json_encode($skills); ?>,
                    certificates: <?php echo json_encode($certificates); ?>
                }
            },
            methods: {
                showFullCert(cert) {
                    this.selectedCert = cert;
                    const certModal = new bootstrap.Modal(document.getElementById('certModal'));
                    certModal.show();
                }
            }
        }).mount('#app');
    </script>

</body>

</html>
