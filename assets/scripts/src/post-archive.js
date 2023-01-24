import { LitElement, html } from 'lit';
import { unsafeHTML } from 'lit/directives/unsafe-html.js';

class PostArchive extends LitElement {
	static properties = {
		page: {
			type: Number,
		},
		perPage: {
			type: Number,
			attribute: 'per-page'
		},
		categories: {
			type: Array,
		},

		_cats: {
			type: Array,
			state: true,
		},
		_posts: {
			type: Array,
			state: true
		},
		_loading: {
			type: Number,
			state: true,
		},
		_usingPostsPlaceholder: {
			type: Boolean,
			state: true
		}
	}

	constructor() {
		super();

		this.page = 1;
		this.perPage = 10;
		this.categories = [];
		this._cats = [];
		this._posts = [];
		this._usingPostsPlaceholder = true;
		this._loading = 0;

		this.postsCollection = new wp.api.collections.Posts();

		this.getCats();

		this.style.display = "flex";
		this.style.flexDirection = "column";
	}

	createRenderRoot() {
		// In Light DOM to allow CSS
		return this;
	}

	firstUpdated() {
		this.clearPlaceholders("navigation");
	}



	clearPlaceholders(type) {
		if ("posts" === type) {
			this._usingPostsPlaceholder = false;
		}

		this.querySelectorAll(`[data-placeholder="${type}"]`).forEach(el => el.remove());
	}

	async getCats() {
		var allCategories = new wp.api.collections.Categories()

		this._cats = await allCategories.fetch({
			data: {
				hide_empty: true
			}
		});

		this.clearPlaceholders('filters');
	}

	toggleCategory(catID) {
		const index = this.categories.indexOf(catID);

		if (index === -1) {
			this.categories.push(catID);
		}
		else {
			this.categories.splice(index, 1);
		}

		this.requestUpdate('categories');
		this.getPosts();
	}

	hasCategory(catID) {
		const index = this.categories.indexOf(catID);
		return index !== -1;
	}

	async getPosts() {
		this.clearPlaceholders("posts");
		this._loading++;

		const posts = await this.postsCollection.fetch({
			data: {
				page: this.page,
				per_page: this.perPage,
				categories: this.categories,
			}
		});

		this._loading--;
		this._posts = posts;
	}

	hasOlderPosts() {
		if (this.postsCollection.state.totalPages === null) {
			return true;
		}

		return this.page < this.postsCollection.state.totalPages;
	}

	showOlderPosts() {
		if (this.hasOlderPosts()) {
			this.page++;
		}

		this.getPosts();
	}

	hasNewerPosts() {
		return this.page > 1;
	}

	showNewerPosts() {
		if (this.hasNewerPosts()) {
			this.page--;
		}

		this.getPosts();
	}



	render() {
		return html`
			${this._cats.length > 0 ? html`
			<div class="scrollbar-subtle -order-1 flex gap-4 mb-8 overflow-x-auto">
				${this._cats.map(cat => { return this.renderChip(cat) })}
			</div>
			` : null}
			
			<div class="grid gap-14">
				${this.renderPosts()}
			</div>
			
			<div class="flex justify-between mt-8">
				<button @click="${this.showNewerPosts}" ?disabled="${!this.hasNewerPosts()}" type="button"
					class="py-2 px-8 border-2 border-theme-500 font-medium text-theme-500 trasition-colors cursor-pointer hover:bg-theme-500 hover:text-white focus:bg-theme-500 focus:text-white disabled:border-gray-500 disabled:text-gray-500 disabled:hover:bg-transparent">
			
					<svg class="md:hidden" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
						fill="currentColor">
						<path d="M0 0h24v24H0z" fill="none" />
						<path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z" />
					</svg>
			
					<span class="hidden md:block">Newer posts</span>
				</button>
			
				<button @click="${this.showOlderPosts}" ?disabled="${!this.hasOlderPosts()}" type="button"
					class="py-2 px-8 border-2 border-theme-500 font-medium text-theme-500 trasition-colors cursor-pointer hover:bg-theme-500 hover:text-white focus:bg-theme-500 focus:text-white disabled:border-gray-500 disabled:text-gray-500 disabled:hover:bg-transparent">
			
					<svg class="md:hidden" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
						fill="currentColor">
						<path d="M0 0h24v24H0z" fill="none" />
						<path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z" />
					</svg>
			
					<span class="hidden md:block">Older posts</span>
				</button>
			</div>
		`;
	}

	renderPosts() {
		if (this._usingPostsPlaceholder) {
			return;
		}

		if (this._loading !== 0) {
			return this.renderPostSkeletons();
		}

		if (this._posts.length > 0) {
			return this._posts.map(post => unsafeHTML(post.preview.default));
		}
		else {
			return this.renderEmpty();
		}
	}

	renderChip(cat) {
		return html`
			<button @click="${() => { this.toggleCategory(cat.id) }}" type="button"
				class="rounded-full py-2 px-4 text-sm whitespace-nowrap ${this.hasCategory(cat.id) ? 'bg-theme-100 dark:bg-theme-900 text-theme-500' : 'bg-gray-100 dark:bg-gray-800'}">
				${cat.name}
			</button>
		`;
	}

	renderPostSkeletons() {
		const lengthArray = Array.from(Array(this.perPage));

		return lengthArray.map(() => html`
			<div class="grid grid-cols-12 gap-6 md:gap-8">
				<div class="col-span-12 md:col-span-6 lg:col-span-4 min-h-[15rem] bg-gray-200 dark:bg-gray-700 animate-pulse">
				</div>
			
				<div class="col-span-12 md:col-span-6 lg:col-span-8 md:py-8">
					<div class="bg-gray-200 dark:bg-gray-700 h-7 w-4/5 animate-pulse rounded-sm mb-4"></div>
					<div class="bg-gray-200 dark:bg-gray-700 h-7 w-1/3 animate-pulse rounded-sm mb-4"></div>
			
					<div class="bg-gray-200 dark:bg-gray-700 h-4 w-4/5 animate-pulse rounded-sm mb-3"></div>
					<div class="bg-gray-200 dark:bg-gray-700 h-4 w-3/5 animate-pulse rounded-sm mb-3"></div>
					<div class="bg-gray-200 dark:bg-gray-700 h-4 w-1/3 animate-pulse rounded-sm mb-8"></div>
			
					<div class="bg-gray-200 dark:bg-gray-700 h-7 w-1/4 animate-pulse rounded-sm"></div>
				</div>
			</div>
		`);
	}

	renderEmpty() {
		return html`
			<div class="text-center py-16">
				<h2 class="text-xl font-semibold mb-3">
					There's nothing here!
				</h2>
			
				<p class="max-w-lg mx-auto">
					We couldn't find any posts that matched your search. Try searching for something shorter or with less filters
					applied.
				</p>
			</div>
		`;
	}
}

customElements.define('post-archive', PostArchive);