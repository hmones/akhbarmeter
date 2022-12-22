import sys
import cfscrape

scraper = cfscrape.CloudflareScraper()
results = scraper.get(sys.argv[1])
print(results.text)
