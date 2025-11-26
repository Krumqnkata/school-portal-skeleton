import Header from "@/components/Header";
import BellSongForm from "@/components/BellSongForm";
import Footer from "@/components/Footer";
import BackToTop from "@/components/BackToTop";

const BellSuggest = () => {
  return (
    <div className="min-h-screen w-full">
      <Header />
      <main>
        <BellSongForm />
      </main>
      <Footer />
      <BackToTop />
    </div>
  );
};

export default BellSuggest;
